-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2013 年 11 月 13 日 07:36
-- 服务器版本: 5.5.24-log
-- PHP 版本: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `xingtuo`
--

-- --------------------------------------------------------

--
-- 表的结构 `xt_advertisement`
--

CREATE TABLE IF NOT EXISTS `xt_advertisement` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `product_id` int(10) unsigned NOT NULL COMMENT '产品ID',
  `file_id` int(10) unsigned NOT NULL COMMENT '图片ID',
  `time` int(11) unsigned NOT NULL COMMENT '上传时间',
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '-2删除，0正常',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='广告表' AUTO_INCREMENT=3 ;

--
-- 转存表中的数据 `xt_advertisement`
--

INSERT INTO `xt_advertisement` (`id`, `product_id`, `file_id`, `time`, `status`) VALUES
(1, 5, 5, 1384324406, 0),
(2, 2, 6, 1384324498, 0);

-- --------------------------------------------------------

--
-- 表的结构 `xt_browse_log`
--

CREATE TABLE IF NOT EXISTS `xt_browse_log` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `product_id` int(10) unsigned NOT NULL COMMENT '产品ID',
  `users_id` int(10) unsigned NOT NULL COMMENT '用户ID',
  `time` int(11) unsigned NOT NULL COMMENT '浏览日期',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='用户浏览日志' AUTO_INCREMENT=6 ;

--
-- 转存表中的数据 `xt_browse_log`
--

INSERT INTO `xt_browse_log` (`id`, `product_id`, `users_id`, `time`) VALUES
(3, 1, 2, 1384145619),
(4, 2, 2, 1384145622),
(5, 3, 2, 1384145627);

-- --------------------------------------------------------

--
-- 表的结构 `xt_file`
--

CREATE TABLE IF NOT EXISTS `xt_file` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `file_address` varchar(40) NOT NULL COMMENT '文件地址',
  `type` tinyint(2) unsigned NOT NULL COMMENT '文件类型：1首页图片，2用户头像，3广告头像',
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '状态',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- 转存表中的数据 `xt_file`
--

INSERT INTO `xt_file` (`id`, `file_address`, `type`, `status`) VALUES
(1, '20130827/52196d734be3f.png', 1, 0),
(2, '20130827/52196d73485e2.jpg', 1, 0),
(3, '20130829/52196d734ae4f.jpg', 2, 0),
(4, '20130829/52196d734be4f.jpg', 2, 0),
(5, '20131113/52831d36a695c.jpg', 3, 0),
(6, '20131113/52831d9226a5d.png', 3, 0);

-- --------------------------------------------------------

--
-- 表的结构 `xt_index`
--

CREATE TABLE IF NOT EXISTS `xt_index` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `pics` varchar(50) NOT NULL COMMENT '图片',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='主页参数表' AUTO_INCREMENT=3 ;

--
-- 转存表中的数据 `xt_index`
--

INSERT INTO `xt_index` (`id`, `pics`) VALUES
(1, '1,2'),
(2, '1,2');

-- --------------------------------------------------------

--
-- 表的结构 `xt_message`
--

CREATE TABLE IF NOT EXISTS `xt_message` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `qid` int(10) unsigned NOT NULL COMMENT '问题id',
  `user_id` int(10) unsigned NOT NULL COMMENT '接收人ID',
  `send_uid` int(10) unsigned NOT NULL COMMENT '发送人id',
  `content` text NOT NULL COMMENT '消息内容',
  `time` int(10) unsigned NOT NULL COMMENT '回复时间',
  `is_read` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '是否已读:0已读，1未读',
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '状态：0正常，1删除',
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='消息表' AUTO_INCREMENT=14 ;

--
-- 转存表中的数据 `xt_message`
--

INSERT INTO `xt_message` (`id`, `qid`, `user_id`, `send_uid`, `content`, `time`, `is_read`, `status`) VALUES
(11, 7, 4, 1, '其实都是一样的！', 1380088956, 1, 0),
(10, 13, 4, 1, '那就简单介绍一下吧！sdfsdf', 1380088669, 1, 0),
(12, 18, 10, 1, '你好 朋友', 1384040543, 1, 0),
(13, 17, 10, 1, '你好 朋友你好 朋友你好 朋友你好 朋友你好 朋友你好 朋友你好 朋友你好 朋友你好 朋友', 1384040585, 1, 0);

-- --------------------------------------------------------

--
-- 表的结构 `xt_news`
--

CREATE TABLE IF NOT EXISTS `xt_news` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `name` char(100) NOT NULL COMMENT '新闻名',
  `content` text NOT NULL COMMENT '新闻内容',
  `pic_id` int(10) unsigned DEFAULT NULL COMMENT '产品图片',
  `create_time` int(11) unsigned NOT NULL COMMENT '创建时间',
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '状态:0正常，-2删除',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='产品表' AUTO_INCREMENT=3 ;

--
-- 转存表中的数据 `xt_news`
--

INSERT INTO `xt_news` (`id`, `name`, `content`, `pic_id`, `create_time`, `status`) VALUES
(1, '新闻咨询1', '新闻咨询1新闻咨询1新闻咨询1新闻咨询1新闻咨询1新闻咨询1新闻咨询1新闻咨询1新闻咨询1新闻咨询1新闻咨询1新闻咨询1新闻咨询1新闻咨询1新闻咨询1新闻咨询1新闻咨询1新闻咨询1新闻咨询1新闻咨询1新闻咨询1新闻咨询1新闻咨询1新闻咨询1新闻咨询1新闻咨询1新闻咨询1新闻咨询1', NULL, 0, 0),
(2, 'aaa1', 'bbbb1', NULL, 1382239252, 0);

-- --------------------------------------------------------

--
-- 表的结构 `xt_product`
--

CREATE TABLE IF NOT EXISTS `xt_product` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `name` char(100) NOT NULL COMMENT '产品名',
  `content` text NOT NULL COMMENT '产品内容',
  `pic_id` int(10) unsigned DEFAULT NULL COMMENT '产品图片',
  `create_time` int(11) unsigned NOT NULL COMMENT '创建时间',
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '状态:0正常，-2删除',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='产品表' AUTO_INCREMENT=7 ;

--
-- 转存表中的数据 `xt_product`
--

INSERT INTO `xt_product` (`id`, `name`, `content`, `pic_id`, `create_time`, `status`) VALUES
(1, '【华润信托】·熙金1号', '【华润信托】·熙金1号【华润信托】·熙金1号【华润信托】·熙金1号【华润信托】·熙金1号【华润信托】·熙金1号', NULL, 1380988557, -2),
(2, '产品名称', '12314', NULL, 1383977888, 0),
(3, '测试产品', '12312\r\n123\r\n1\r\n312\r\n31\r\n23\r\n123\r\n12', NULL, 1384033618, 0),
(5, '产品名称4', '发行机构：发行机构\r\n产品期限：产品期限\r\n募集规模：募集规模\r\n起始资金：起始资金\r\n产品收益：产品收益\r\n产品说明：产品收益', NULL, 1384151164, 0),
(4, '产品名称', '发行机构:sfjskfjasjfdlsjlfasdfasdf\r\nqweqwe\r\nqwe\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\nqe\r\nqwe\r\nqw\r\ne', NULL, 1384149175, 0),
(6, '产品名称', '发行机构：\r\n产品期限：\r\n募集规模：\r\n起始资金：\r\n产品收益：\r\n产品说明：', NULL, 1384326283, 0);

-- --------------------------------------------------------

--
-- 表的结构 `xt_question`
--

CREATE TABLE IF NOT EXISTS `xt_question` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `user_id` int(10) unsigned NOT NULL COMMENT '提问人',
  `content` text NOT NULL COMMENT '提问内容',
  `time` int(10) unsigned NOT NULL COMMENT '提问时间',
  `is_reply` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '是否回复：1为未回复，0 已回复',
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0正常，-2删除',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=19 ;

--
-- 转存表中的数据 `xt_question`
--

INSERT INTO `xt_question` (`id`, `user_id`, `content`, `time`, `is_reply`, `status`) VALUES
(2, 2, '请问这个东西怎么吃', 1377522221, 1, -2),
(3, 2, '这是什么情况呀？', 1377522607, 1, 0),
(4, 2, '这个产品请介绍下', 1377522796, 1, 0),
(5, 4, '信托是什么？信托公司是干嘛的？', 1377650319, 1, 0),
(6, 4, '收益有10%这么高？银行都没有这麽高可靠吗？', 1377650319, 1, 0),
(13, 4, '介绍一下。', 1380077621, 0, 0),
(7, 4, '银行和信托公司都可以买，为什么通过您们买？', 1377650319, 0, 0),
(14, 10, 'Nihao ', 1384040381, 1, 0),
(15, 10, 'Nihao ', 1384040383, 1, 0),
(16, 10, 'Nihao ', 1384040383, 1, 0),
(17, 10, 'Nihao ', 1384040384, 0, 0),
(18, 10, 'Nihao ', 1384040384, 0, 0);

-- --------------------------------------------------------

--
-- 表的结构 `xt_users`
--

CREATE TABLE IF NOT EXISTS `xt_users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `account` char(11) NOT NULL,
  `name` varchar(50) DEFAULT '' COMMENT '称呢',
  `password` char(32) NOT NULL,
  `last_login_time` int(11) unsigned NOT NULL DEFAULT '0',
  `last_login_ip` varchar(40) NOT NULL DEFAULT '0',
  `login_count` smallint(6) unsigned NOT NULL DEFAULT '0' COMMENT '登陆次数',
  `create_time` int(11) unsigned NOT NULL,
  `update_time` int(11) unsigned NOT NULL,
  `type` tinyint(1) unsigned NOT NULL COMMENT '用户类型:0管理员，1普通用户，2客户经理',
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0正常、1待审核、-2删除',
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  UNIQUE KEY `account` (`account`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT COMMENT='用户表' AUTO_INCREMENT=13 ;

--
-- 转存表中的数据 `xt_users`
--

INSERT INTO `xt_users` (`id`, `account`, `name`, `password`, `last_login_time`, `last_login_ip`, `login_count`, `create_time`, `update_time`, `type`, `status`) VALUES
(1, 'admin', '管理', 'e10adc3949ba59abbe56e057f20f883e', 1384315104, '192.168.1.102', 159, 1376561926, 1376561926, 0, 0),
(2, '13761951734', 'wade', 'e10adc3949ba59abbe56e057f20f883e', 1383980732, '192.168.1.100', 13, 1377506459, 1377506459, 1, 0),
(3, '18516146011', '', 'e10adc3949ba59abbe56e057f20f883e', 1383987593, '192.168.1.100', 8, 1377590474, 1377590474, 1, 0),
(5, '13761951735', '', 'e10adc3949ba59abbe56e057f20f883e', 1383981952, '192.168.1.100', 2, 1377847312, 1377847312, 1, 0),
(6, '13761951739', '', 'e10adc3949ba59abbe56e057f20f883e', 1383987613, '192.168.1.100', 1, 1377847970, 1377847970, 1, 0),
(7, '13761951738', '', 'e10adc3949ba59abbe56e057f20f883e', 1383978421, '192.168.1.100', 2, 1377852591, 1377852591, 2, 0),
(8, '15912345678', '', 'e10adc3949ba59abbe56e057f20f883e', 1377875285, '192.168.1.100', 0, 1377875285, 1377875285, 2, 0),
(9, '13787654321', 'JSon', 'e10adc3949ba59abbe56e057f20f883e', 1384059690, '114.94.57.46', 6, 1380980103, 1380980103, 1, 0),
(10, '13765432178', 'aaa', 'e10adc3949ba59abbe56e057f20f883e', 1384136370, '180.168.147.18', 22, 1380980296, 1380980296, 2, 0),
(11, '13761951123', '', 'e10adc3949ba59abbe56e057f20f883e', 1383978219, '192.168.1.100', 0, 1383978219, 1383978219, 1, 0),
(12, 'system', '管理', 'e10adc3949ba59abbe56e057f20f883e', 1384005028, '115.29.165.8', 148, 1376561926, 1376561926, 0, -2);

-- --------------------------------------------------------

--
-- 表的结构 `xt_user_info`
--

CREATE TABLE IF NOT EXISTS `xt_user_info` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `user_id` int(10) unsigned NOT NULL COMMENT '用户id',
  `director_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '隶属客户经理',
  `file_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '用户头像',
  `age` tinyint(3) unsigned DEFAULT NULL COMMENT '年龄',
  `sex` char(1) DEFAULT NULL COMMENT '性别',
  `identity` char(20) DEFAULT NULL COMMENT '身份证件',
  `email` char(50) DEFAULT NULL COMMENT '邮箱',
  `province` char(10) DEFAULT NULL COMMENT '省份',
  `city` char(10) DEFAULT NULL COMMENT '城市',
  `street` varchar(150) DEFAULT NULL COMMENT '街道地址',
  `interest` char(100) DEFAULT NULL COMMENT '兴趣爱好',
  `purchase` varchar(100) DEFAULT NULL COMMENT '已购买的产品',
  `remarks` varchar(500) DEFAULT NULL COMMENT '客户备注',
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `user_id_2` (`user_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='用户详细资料' AUTO_INCREMENT=16 ;

--
-- 转存表中的数据 `xt_user_info`
--

INSERT INTO `xt_user_info` (`id`, `user_id`, `director_id`, `file_id`, `age`, `sex`, `identity`, `email`, `province`, `city`, `street`, `interest`, `purchase`, `remarks`) VALUES
(1, 1, 0, 3, 21, '男', NULL, 'ucdchina@gmail.com', '广东省', '深圳市', '111号', '理财产品', '无', '这是管理员aaeqweqe'),
(2, 2, 0, 4, 21, '男', '', 'lin@qq.com', '上海', '上海市', '陆家嘴', '期货产品', '无', '<u><b>dadasa<strike>sdasdas</strike></b></u>'),
(3, 3, 0, 0, 22, '女', NULL, 'wuzhiyong', '上海', '上海市', '陆家嘴', '暂无', '无', NULL),
(5, 5, 0, 0, 7, '男', NULL, 'aaaaa@qq.com', 'bbbb', 'ccc', 'ddde', 'eee', 'fff', 'ggggggggg~'),
(6, 100, 0, 0, 6, '女', NULL, '', '', '', '', '', '', ''),
(10, 6, 0, 0, 6, '女', NULL, '12313123@qq.com', '12312312bb', '22222222', '', '', '', ''),
(11, 7, 0, 0, 5, '男', NULL, 'zzz@qq.com', '13123', '2423', '423423', '3245', '234234', '5'),
(12, 8, 0, 0, 7, '女', NULL, '', '', '', '', '', '', ''),
(13, 9, 10, 0, 1, '男', '3424011', '', '', '', '', '', '', ''),
(14, 10, 0, 0, 1, '男', 'sdasdad', '', '', '', '', '', '', ''),
(15, 11, 0, 0, 1, '男', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- 表的结构 `xt_verify`
--

CREATE TABLE IF NOT EXISTS `xt_verify` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `telephone` char(11) NOT NULL COMMENT '手机',
  `verify` char(6) NOT NULL COMMENT '验证码',
  `expired` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '过期时间',
  `type` tinyint(2) unsigned NOT NULL COMMENT '类型：1注册、2店铺加盟',
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0可用，1已使用',
  PRIMARY KEY (`id`),
  KEY `telephone` (`telephone`),
  KEY `telephone_2` (`telephone`),
  KEY `telephone_3` (`telephone`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- 转存表中的数据 `xt_verify`
--

INSERT INTO `xt_verify` (`id`, `telephone`, `verify`, `expired`, `type`, `status`) VALUES
(8, '13761951734', '717717', 1384151715, 1, 0),
(9, '13761951734', '647250', 1384151816, 1, 0),
(10, '13761951734', '455384', 1384152704, 1, 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
