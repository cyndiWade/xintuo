-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2013 年 09 月 25 日 07:15
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
-- 表的结构 `xt_file`
--

CREATE TABLE IF NOT EXISTS `xt_file` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `file_address` varchar(40) NOT NULL COMMENT '文件地址',
  `type` tinyint(2) unsigned NOT NULL COMMENT '文件类型：1首页图片，2用户头像',
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '状态',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- 转存表中的数据 `xt_file`
--

INSERT INTO `xt_file` (`id`, `file_address`, `type`, `status`) VALUES
(1, '20130827/52196d734be3f.png', 1, 0),
(2, '20130827/52196d73485e2.jpg', 1, 0),
(3, '20130829/52196d734ae4f.jpg', 2, 0),
(4, '20130829/52196d734be4f.jpg', 2, 0);

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='消息表' AUTO_INCREMENT=12 ;

--
-- 转存表中的数据 `xt_message`
--

INSERT INTO `xt_message` (`id`, `qid`, `user_id`, `send_uid`, `content`, `time`, `is_read`, `status`) VALUES
(11, 7, 4, 1, '其实都是一样的！', 1380088956, 1, 0),
(10, 13, 4, 1, '那就简单介绍一下吧！sdfsdf', 1380088669, 1, 0);

-- --------------------------------------------------------

--
-- 表的结构 `xt_new`
--

CREATE TABLE IF NOT EXISTS `xt_new` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `name` char(50) NOT NULL COMMENT '新闻名',
  `pic` int(10) NOT NULL DEFAULT '0' COMMENT '图片id',
  `url` varchar(200) DEFAULT '' COMMENT '网页地址',
  `time` int(10) unsigned NOT NULL COMMENT '时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='新闻' AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `xt_new`
--

INSERT INTO `xt_new` (`id`, `name`, `pic`, `url`, `time`) VALUES
(1, 'aaa', 0, 'http://www.baidu.com?index.php', 1377509167);

-- --------------------------------------------------------

--
-- 表的结构 `xt_product`
--

CREATE TABLE IF NOT EXISTS `xt_product` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `name` char(100) NOT NULL COMMENT '产品名',
  `issue` varchar(255) NOT NULL COMMENT '发行机构',
  `product_type` varchar(255) NOT NULL COMMENT '产品类型',
  `investment` varchar(50) NOT NULL COMMENT '投资起点',
  `term` varchar(50) NOT NULL COMMENT '期限',
  `profit` varchar(50) NOT NULL COMMENT '年化收益',
  `pic` int(10) unsigned DEFAULT '0' COMMENT '图片id',
  `url` varchar(200) NOT NULL COMMENT '网页地址',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='产品表' AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `xt_product`
--

INSERT INTO `xt_product` (`id`, `name`, `issue`, `product_type`, `investment`, `term`, `profit`, `pic`, `url`) VALUES
(1, '【华润信托】·熙金1号', '华润信托', '证券类', '100万', '12个月', '10%-15%', 0, 'http://www.wealthplus.cn/P_18/314a.html');

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

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
(7, 4, '银行和信托公司都可以买，为什么通过您们买？', 1377650319, 0, 0);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT COMMENT='用户表' AUTO_INCREMENT=9 ;

--
-- 转存表中的数据 `xt_users`
--

INSERT INTO `xt_users` (`id`, `account`, `name`, `password`, `last_login_time`, `last_login_ip`, `login_count`, `create_time`, `update_time`, `type`, `status`) VALUES
(1, 'admin', '管理员', 'e10adc3949ba59abbe56e057f20f883e', 1380090026, '192.168.1.102', 137, 1376561926, 1376561926, 0, 0),
(2, '13761951734', 'wade', 'e10adc3949ba59abbe56e057f20f883e', 1377590052, '192.168.1.27', 2, 1377506459, 1377506459, 1, 0),
(3, '18516146011', '', '202cb962ac59075b964b07152d234b70', 1377592012, '192.168.1.11', 4, 1377590474, 1377590474, 1, 0),
(5, '13761951735', '', 'd41d8cd98f00b204e9800998ecf8427e', 1377847312, '192.168.1.27', 0, 1377847312, 1377847312, 1, 0),
(6, '13761951739', '', 'd41d8cd98f00b204e9800998ecf8427e', 1377847970, '192.168.1.27', 0, 1377847970, 1377847970, 1, 0),
(7, '13761951738', '', 'd41d8cd98f00b204e9800998ecf8427e', 1377852591, '192.168.1.27', 0, 1377852591, 1377852591, 2, 0),
(8, '15912345678', '', 'd41d8cd98f00b204e9800998ecf8427e', 1377875285, '192.168.1.100', 0, 1377875285, 1377875285, 2, 0);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='用户详细资料' AUTO_INCREMENT=13 ;

--
-- 转存表中的数据 `xt_user_info`
--

INSERT INTO `xt_user_info` (`id`, `user_id`, `director_id`, `file_id`, `age`, `sex`, `email`, `province`, `city`, `street`, `interest`, `purchase`, `remarks`) VALUES
(1, 1, 0, 3, 21, '男', 'ucdchina@gmail.com', '广东省', '深圳市', '111号', '理财产品', '无', '这是管理员aaeqweqe'),
(2, 2, 0, 4, 21, '男', 'lin@qq.com', '上海', '上海市', '陆家嘴', '期货产品', '无', '<u><b>dadasa<strike>sdasdas</strike></b></u>'),
(3, 3, 7, 0, 22, '女', 'wuzhiyong', '上海', '上海市', '陆家嘴', '暂无', '无', NULL),
(5, 5, 0, 0, 7, '男', 'aaaaa@qq.com', 'bbbb', 'ccc', 'ddde', 'eee', 'fff', 'ggggggggg~'),
(6, 100, 0, 0, 6, '女', '', '', '', '', '', '', ''),
(10, 6, 8, 0, 6, '女', '12313123@qq.com', '12312312bb', '22222222', '', '', '', ''),
(11, 7, 0, 0, 5, '男', 'zzz@qq.com', '13123', '2423', '423423', '3245', '234234', '5'),
(12, 8, 0, 0, 7, '女', '', '', '', '', '', '', '');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- 转存表中的数据 `xt_verify`
--

INSERT INTO `xt_verify` (`id`, `telephone`, `verify`, `expired`, `type`, `status`) VALUES
(1, '13761951734', '325448', 1377506666, 1, 1),
(2, '13761951734', '395559', 1377589363, 1, 1),
(3, '18516146011', '426398', 1377590544, 1, 1),
(4, '18516146011', '492224', 1378719367, 1, 0),
(5, '18516146011', '545454', 1378719435, 1, 0),
(6, '18516146011', '226086', 1378719533, 1, 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
