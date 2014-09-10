-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- 主机: localhost:3306
-- 生成日期: 2014 年 01 月 03 日 05:41
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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='广告表' AUTO_INCREMENT=9 ;

--
-- 转存表中的数据 `xt_advertisement`
--

INSERT INTO `xt_advertisement` (`id`, `product_id`, `file_id`, `time`, `status`) VALUES
(6, 6, 9, 1385019487, 0),
(5, 4, 8, 1384328678, 0),
(4, 4, 7, 1384327884, 0),
(7, 6, 10, 1387382189, 0),
(8, 6, 11, 1387382273, 0);

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='用户浏览日志' AUTO_INCREMENT=98 ;

--
-- 转存表中的数据 `xt_browse_log`
--

INSERT INTO `xt_browse_log` (`id`, `product_id`, `users_id`, `time`) VALUES
(3, 1, 2, 1384145619),
(4, 2, 2, 1384145622),
(5, 3, 2, 1384145627),
(6, 2, 14, 1384422995),
(7, 4, 14, 1384423000),
(8, 3, 14, 1384423002),
(9, 2, 14, 1384423005),
(10, 3, 14, 1384423007),
(11, 3, 14, 1384423017),
(12, 2, 14, 1384423022),
(13, 2, 14, 1384423026),
(14, 2, 14, 1384423330),
(15, 4, 14, 1384423337),
(16, 2, 10, 1384506896),
(17, 3, 10, 1384506899),
(18, 4, 10, 1385024987),
(19, 3, 10, 1385024988),
(20, 3, 10, 1385024989),
(21, 4, 10, 1385024989),
(22, 5, 10, 1385024990),
(23, 5, 10, 1385024991),
(24, 6, 10, 1385024991),
(25, 6, 10, 1385024996),
(26, 6, 10, 1385024997),
(27, 6, 10, 1385025003),
(28, 4, 9, 1385025764),
(29, 3, 9, 1385025765),
(30, 3, 9, 1385025765),
(31, 4, 9, 1385025766),
(32, 6, 9, 1385025767),
(33, 6, 9, 1385025768),
(34, 2, 14, 1386137663),
(35, 3, 14, 1386137670),
(36, 4, 14, 1386137672),
(37, 5, 14, 1386137672),
(38, 6, 14, 1386137705),
(39, 4, 14, 1386137721),
(40, 5, 14, 1386137722),
(41, 2, 14, 1386137724),
(42, 2, 14, 1386137726),
(43, 5, 14, 1386143324),
(44, 6, 14, 1386143334),
(45, 4, 14, 1386143343),
(46, 3, 14, 1386143344),
(47, 2, 14, 1386143346),
(48, 4, 14, 1386143350),
(49, 5, 14, 1386143351),
(50, 5, 14, 1386143362),
(51, 6, 14, 1386143372),
(52, 4, 14, 1386143374),
(53, 5, 14, 1386143375),
(54, 2, 14, 1386143378),
(55, 6, 10, 1386315345),
(56, 5, 2, 1386325698),
(57, 6, 24, 1386643585),
(58, 6, 24, 1386643586),
(59, 4, 24, 1386643587),
(60, 4, 24, 1386643588),
(61, 4, 25, 1386643856),
(62, 3, 25, 1386643857),
(63, 4, 25, 1386643859),
(64, 6, 25, 1386645099),
(65, 6, 25, 1386645100),
(66, 4, 24, 1386645455),
(67, 4, 24, 1386645456),
(68, 6, 24, 1386645457),
(69, 6, 24, 1386645471),
(70, 4, 24, 1386645472),
(71, 4, 24, 1386645474),
(72, 6, 14, 1386659888),
(73, 5, 14, 1386659892),
(74, 4, 14, 1386659894),
(75, 3, 14, 1386659895),
(76, 2, 14, 1386659896),
(77, 6, 14, 1386659898),
(78, 4, 14, 1386659899),
(79, 5, 14, 1386659901),
(80, 3, 14, 1386659907),
(81, 2, 14, 1386659908),
(82, 5, 14, 1386659909),
(83, 6, 14, 1386659912),
(84, 2, 14, 1386659930),
(85, 6, 10, 1386660452),
(86, 6, 10, 1386660453),
(87, 6, 10, 1386660454),
(88, 6, 10, 1386660454),
(89, 6, 9, 1386660465),
(90, 6, 24, 1386661037),
(91, 6, 24, 1386662642),
(92, 6, 24, 1386662642),
(93, 6, 24, 1386662643),
(94, 6, 26, 1386663644),
(95, 6, 26, 1386663645),
(96, 6, 26, 1386665217),
(97, 6, 10, 1387276950);

-- --------------------------------------------------------

--
-- 表的结构 `xt_director_user`
--

CREATE TABLE IF NOT EXISTS `xt_director_user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `director_id` int(10) unsigned NOT NULL COMMENT '客户经理ID',
  `user_id` int(10) unsigned NOT NULL COMMENT '用户ID',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='客户经理与用户关系表' AUTO_INCREMENT=67 ;

--
-- 转存表中的数据 `xt_director_user`
--

INSERT INTO `xt_director_user` (`id`, `director_id`, `user_id`) VALUES
(64, 10, 2),
(60, 7, 3),
(66, 7, 2),
(45, 21, 6),
(46, 21, 14),
(47, 21, 24),
(48, 21, 2),
(49, 26, 5),
(50, 26, 9),
(51, 26, 11),
(52, 26, 14),
(65, 10, 3),
(55, 25, 6),
(56, 25, 14),
(62, 8, 2),
(61, 7, 5),
(63, 8, 3);

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- 转存表中的数据 `xt_file`
--

INSERT INTO `xt_file` (`id`, `file_address`, `type`, `status`) VALUES
(1, '20130827/52196d734be3f.png', 1, 0),
(2, '20130827/52196d73485e2.jpg', 1, 0),
(3, '20130829/52196d734ae4f.jpg', 2, 0),
(4, '20130829/52196d734be4f.jpg', 2, 0),
(5, '20131113/528328858273e.png', 3, 0),
(6, '20131113/5283296ea52bb.png', 3, 0),
(7, '20131113/52832accc08bb.png', 3, 0),
(8, '20131113/52832de6460cb.png', 3, 0),
(9, '20131121/528db85f8ed4a.jpg', 3, 0),
(10, '20131218/52b1c5ad91cac.jpg', 3, 0),
(11, '20131218/52b1c601710f7.jpg', 3, 0);

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='产品表' AUTO_INCREMENT=5 ;

--
-- 转存表中的数据 `xt_news`
--

INSERT INTO `xt_news` (`id`, `name`, `content`, `pic_id`, `create_time`, `status`) VALUES
(1, '新闻咨询1', '新闻咨询1新闻咨询1新闻咨询1新闻咨询1新闻咨询1新闻咨询1新闻咨询1新闻咨询1新闻咨询1新闻咨询1新闻咨询1新闻咨询1新闻咨询1新闻咨询1新闻咨询1新闻咨询1新闻咨询1新闻咨询1新闻咨询1新闻咨询1新闻咨询1新闻咨询1新闻咨询1新闻咨询1新闻咨询1新闻咨询1新闻咨询1新闻咨询1', NULL, 0, -2),
(2, 'aaa1', 'bbbb1', NULL, 1382239252, -2),
(3, '国土部统管不动产登记铺路房产税', '11月20日，国务院召开常务会议。会议指出，整合不动产登记职责、建立不动产统一登记制度，是国务院机构改革和职能转变方案的重要内容，也是完善社会主义市场经济体制、建设现代市场体系的必然要求。\r\n不动产登记系统及房屋价值动态评估系统，是房产税全面开征的两大必要技术前提。目前看一、二线城市的房屋价值动态评估系统都在网签后逐渐完善。如果不动产登记系统能够建立，房产税的推进将会明显加速。', NULL, 1385019083, 0),
(4, '医院纠纷', '12月9日下午3点左右，广州伊丽莎白妇产医院发生了一起病患家属聚众打砸事件，近百人用事先准备好的砖头木棒打砸医院一楼大门和接待大厅，现场损毁严重，遍地狼藉', NULL, 1386643111, 0);

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='产品表' AUTO_INCREMENT=11 ;

--
-- 转存表中的数据 `xt_product`
--

INSERT INTO `xt_product` (`id`, `name`, `content`, `pic_id`, `create_time`, `status`) VALUES
(1, '【华润信托】·熙金1号', '【华润信托】·熙金1号【华润信托】·熙金1号【华润信托】·熙金1号【华润信托】·熙金1号【华润信托】·熙金1号', NULL, 1380988557, -2),
(2, '产品名称', '发行机构：发行机构\r\n产品期限：产品期限\r\n募集规模：募集规模\r\n起始资金：起始资金\r\n产品收益：产品收益\r\n产品说明：产品收益', NULL, 1383977888, -2),
(3, '测试产品', '测试产品2', NULL, 1384033618, -2),
(4, '产品名称', '产品名称3', NULL, 1384148898, -2),
(5, '产品名称4', '发行机构：123\r\n产品期限：456\r\n募集规模：789\r\n起始资金：101112\r\n产品收益：131415\r\n产品说明：', NULL, 1384183957, 0),
(6, '兴拓财富 -  稳利1号', '发行机构：上海兴拓投资管理有限公司\r\n产品期限：36个月\r\n募集规模：3000万\r\n起始资金：10万\r\n产品收益：7.5%-11.5%\r\n产品说明：10万起，每季度付息一次，收益高，投资本息有保障。', NULL, 1385018802, 0),
(7, 'bbbbbb', '发行机构：\r\n产品期限：\r\n募集规模：\r\n起始资金：\r\n产品收益：\r\n产品说明：', NULL, 1387382967, 0),
(8, 'cccccccccccc', '发行机构：\r\n产品期限：\r\n募集规模：\r\n起始资金：\r\n产品收益：\r\n产品说明：', NULL, 1387382973, 0),
(9, 'ddddddddddd', '发行机构：\r\n产品期限：\r\n募集规模：\r\n起始资金：\r\n产品收益：\r\n产品说明：', NULL, 1387382977, 0),
(10, 'eeeeeeeeeeee', '发行机构：\r\n产品期限：\r\n募集规模：\r\n起始资金：\r\n产品收益：\r\n产品说明：', NULL, 1387382985, 0);

-- --------------------------------------------------------

--
-- 表的结构 `xt_product_user`
--

CREATE TABLE IF NOT EXISTS `xt_product_user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `product_id` int(10) unsigned NOT NULL COMMENT '产品ID',
  `users_id` int(10) unsigned NOT NULL COMMENT '用户ID',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='产品用户关系表' AUTO_INCREMENT=15 ;

--
-- 转存表中的数据 `xt_product_user`
--

INSERT INTO `xt_product_user` (`id`, `product_id`, `users_id`) VALUES
(8, 6, 3),
(9, 6, 5),
(13, 5, 2),
(4, 6, 14),
(5, 6, 24),
(6, 6, 11),
(7, 6, 2),
(11, 6, 9),
(14, 7, 9);

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=20 ;

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
(18, 10, 'Nihao ', 1384040384, 0, 0),
(19, 25, 'slaj', 1386645204, 1, 0);

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT COMMENT='用户表' AUTO_INCREMENT=28 ;

--
-- 转存表中的数据 `xt_users`
--

INSERT INTO `xt_users` (`id`, `account`, `name`, `password`, `last_login_time`, `last_login_ip`, `login_count`, `create_time`, `update_time`, `type`, `status`) VALUES
(1, 'admin', '管理', 'e10adc3949ba59abbe56e057f20f883e', 1388718605, '192.168.1.100', 187, 1376561926, 1376561926, 0, 0),
(2, '13761951734', 'wade', 'e10adc3949ba59abbe56e057f20f883e', 1388726306, '192.168.1.100', 20, 1377506459, 1377506459, 1, 0),
(3, '18516146011', '', 'e10adc3949ba59abbe56e057f20f883e', 1383987593, '192.168.1.100', 8, 1377590474, 1377590474, 1, 0),
(5, '13761951735', '', 'e10adc3949ba59abbe56e057f20f883e', 1383981952, '192.168.1.100', 2, 1377847312, 1377847312, 1, 0),
(6, '13761951739', '', 'e10adc3949ba59abbe56e057f20f883e', 1383987613, '192.168.1.100', 1, 1377847970, 1377847970, 1, 0),
(7, '13761951738', '', 'e10adc3949ba59abbe56e057f20f883e', 1388725401, '192.168.1.100', 5, 1377852591, 1377852591, 2, 0),
(8, '15912345678', '', 'e10adc3949ba59abbe56e057f20f883e', 1377875285, '192.168.1.100', 0, 1377875285, 1377875285, 2, 0),
(9, '13787654321', 'JSon', 'e10adc3949ba59abbe56e057f20f883e', 1386660428, '116.231.99.166', 16, 1380980103, 1380980103, 1, 0),
(10, '13765432178', 'aaa', 'e10adc3949ba59abbe56e057f20f883e', 1387357396, '116.231.99.166', 72, 1380980296, 1380980296, 2, 0),
(11, '13761951123', '', 'e10adc3949ba59abbe56e057f20f883e', 1383978219, '192.168.1.100', 0, 1383978219, 1383978219, 1, 0),
(12, 'system', '管理', 'e10adc3949ba59abbe56e057f20f883e', 1384005028, '115.29.165.8', 148, 1376561926, 1376561926, 0, -2),
(15, '15900991300', '柯敏', 'd41d8cd98f00b204e9800998ecf8427e', 1385019778, '120.90.8.166', 0, 1385019778, 1385019778, 2, -2),
(14, '13917876491', '', 'e10adc3949ba59abbe56e057f20f883e', 1386915139, '116.231.99.166', 29, 1384240665, 1384240665, 1, 0),
(16, '18621852171', '董渊', 'd41d8cd98f00b204e9800998ecf8427e', 1385020039, '120.90.8.166', 0, 1385020039, 1385020039, 2, -2),
(17, '13501965202', '沈麒卿', 'd41d8cd98f00b204e9800998ecf8427e', 1385020137, '120.90.8.166', 0, 1385020137, 1385020137, 2, -2),
(18, '13302480265', '韩正', 'd41d8cd98f00b204e9800998ecf8427e', 1385020914, '120.90.8.166', 0, 1385020914, 1385020914, 1, -2),
(19, '15826415694', '戴安娜', 'd41d8cd98f00b204e9800998ecf8427e', 1385021184, '120.90.8.166', 0, 1385021184, 1385021184, 1, -2),
(20, '13958482560', '习老大', 'd41d8cd98f00b204e9800998ecf8427e', 1385021412, '120.90.8.166', 0, 1385021412, 1385021412, 1, -2),
(21, '13916307450', '曾准', 'c3d01bb027f94b3f10719ad77196ccc9', 1386659576, '120.90.8.166', 9, 1386060184, 1386060184, 2, 0),
(22, '18221340185', '蓝润华', '987c38c0f2169d41f78e42ddb14edf97', 1386676924, '180.152.235.106', 7, 1386060682, 1386060682, 1, 0),
(24, '13585594007', '邵', 'b5747d62a1ec253d42071003b92068d2', 1386660205, '120.90.8.166', 4, 1386642748, 1386642748, 1, 0),
(23, '13713712345', 'Evan', 'c33367701511b4f6020ec61ded352059', 1386659666, '116.231.99.166', 17, 1386137852, 1386137852, 1, 0),
(25, '13738025943', '11', 'dc37afe084b817300a74c12798fbdcff', 1386644253, '120.90.8.166', 3, 1386642918, 1386642918, 2, 0),
(26, '15900991299', '', '10c49caa073a619d40b8710f3a78e733', 1386663592, '120.90.8.166', 1, 1386662856, 1386662856, 2, 0),
(27, '13672239965', '张家驹', '21103082385f9c993278e5ed68509a8b', 1386665384, '120.90.8.166', 16, 1386662947, 1386662947, 1, 0);

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='用户详细资料' AUTO_INCREMENT=30 ;

--
-- 转存表中的数据 `xt_user_info`
--

INSERT INTO `xt_user_info` (`id`, `user_id`, `director_id`, `file_id`, `age`, `sex`, `identity`, `email`, `province`, `city`, `street`, `interest`, `purchase`, `remarks`) VALUES
(1, 1, 0, 3, 21, '男', NULL, 'ucdchina@gmail.com', '广东省', '深圳市', '111号', '理财产品', '无', '这是管理员aaeqweqe'),
(2, 2, 0, 4, 21, '男', '', 'lin@qq.com', '上海', '上海市', '陆家嘴', '期货产品', '无', '<u><b>dadasa<strike>sdasdas</strike></b></u>'),
(3, 3, 7, 0, 22, '女', NULL, 'wuzhiyong', '上海', '上海市', '陆家嘴', '暂无', '无', NULL),
(5, 5, 10, 0, 7, '男', NULL, 'aaaaa@qq.com', 'bbbb', 'ccc', 'ddde', 'eee', 'fff', 'ggggggggg~'),
(6, 100, 0, 0, 6, '女', NULL, '', '', '', '', '', '', ''),
(10, 6, 0, 0, 6, '女', NULL, '12313123@qq.com', '12312312bb', '22222222', '', '', '', ''),
(11, 7, 0, 0, 5, '男', NULL, 'zzz@qq.com', '13123', '2423', '423423', '3245', '234234', '5'),
(12, 8, 0, 0, 7, '女', NULL, '', '', '', '', '', '', ''),
(13, 9, 7, 0, 1, '男', '3424011', '', '', '', '', '', '', ''),
(14, 10, 0, 0, 1, '男', 'sdasdad', '', '', '', '', '', '', ''),
(15, 11, 0, 0, 1, '男', '', '', '', '', '', '', '', ''),
(22, 21, 0, 0, 1, '男', '310287199002231215', '', '', '', '', '', '', ''),
(16, 15, 0, 0, 1, '女', '', 'ke.min@wealthplus.cn', '上海', '上海', '徐汇', '', '', ''),
(17, 16, 0, 0, 1, '男', '', 'dong.yuan@wealthplus.cn', '上海', '上海', '徐汇', '', '', ''),
(18, 17, 0, 0, 1, '男', '', 'shen.qiqing@wealthplus.cn', '上海', '上海', '徐汇', '', '', ''),
(19, 18, 17, 0, 59, '男', '', 'hanzheng@sina.cn', '上海', '上海', '黄埔大沽路100号', '信托', '爱建信托-南京六合经开区', '高质量客户，后续资金较大，有投资意识，投资渠道广泛，风险偏好为稳健型。'),
(20, 19, 15, 0, 35, '女', '', 'daianna@gmail.com', '广东', '深圳', '罗湖区深南东路5018号', '私募基金', '泽熙1号', '客户较年轻，高净值，追求高收益，风险偏好为激进型'),
(21, 20, 16, 0, 60, '男', '', '1258485@qq.com', '北京', '北京', '西城区中南海', '私募股权', '鼎晖人民币私募股权基金', '资金量庞大，努力跟进'),
(23, 22, 7, 0, 1, '男', '320248199101050106', '', '上海', '上海', '黄浦区大沽路100号', '信托', '中铁信托', '<P>产品名称：中铁信托</P>\r\n<P>产品期限：12个月</P>'),
(24, 23, 25, 0, 1, '男', '', '', '', '', '', '', '', 'test'),
(25, 24, 26, 0, 22, '男', '321589198410121245', 'l8515@sina.com', '上海', '上海', '黄浦区大沽路100号', '信托', '中航信托天启332号', '<P>产品名称：中航信托</P>\r\n<P>产品期限：24个月</P>\r\n<P>收益区间：8%-12%</P>\r\n<P>资金投向：用于济南大地市政工程</P>\r\n<P>风险控制：政府财政担保</P>'),
(26, 25, 0, 0, 1, '男', '310158198412101248', '', '', '', '', '', '', ''),
(27, 26, 0, 0, 1, '男', '', '', '', '', '', '', '', ''),
(28, 27, 26, 0, 1, '男', '', '', ' 三方', '上分公司', '是发给', '   上纲上线', '  啊嘎嘎全国', ''),
(29, 14, 7, 0, 1, '男', '', '', '', '', '', '', '', '');

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=39 ;

--
-- 转存表中的数据 `xt_verify`
--

INSERT INTO `xt_verify` (`id`, `telephone`, `verify`, `expired`, `type`, `status`) VALUES
(8, '18516146011', '515051', 1384151591, 1, 0),
(9, '18516146011', '396778', 1384151690, 1, 0),
(10, '18516146011', '188722', 1384152805, 1, 0),
(11, '18516146011', '344877', 1384152875, 1, 0),
(12, '13761951734', '259244', 1384152901, 1, 0),
(13, '13761951734', '503453', 1384156503, 1, 0),
(14, '13761951734', '680362', 1384158229, 1, 0),
(15, '13761951734', '700562', 1384184187, 1, 0),
(16, '13761951734', '504731', 1384231169, 1, 0),
(17, '13917876491', '179625', 1384236726, 1, 0),
(18, '13917876491', '777708', 1384236798, 1, 0),
(19, '13917876491', '522568', 1384237589, 1, 1),
(20, '13917876491', '596118', 1384238673, 1, 1),
(21, '13917876491', '155849', 1384240923, 1, 1),
(22, '18221340185', '511221', 1386061392, 1, 0),
(23, '18221340185', '819246', 1386061456, 1, 0),
(24, '15000035200', '183230', 1386077570, 1, 0),
(25, '15000035500', '895712', 1386078742, 1, 0),
(26, '18516146011', '667223', 1386212745, 1, 0),
(27, '18516146011', '624742', 1386212808, 1, 0),
(28, '18600489501', '406252', 1386642359, 1, 0),
(29, '13636527500', '505100', 1386645884, 1, 0),
(30, '13636527500', '528594', 1386645986, 1, 0),
(31, '13672239965', '814038', 1386664883, 1, 0),
(32, '13672239965', '905124', 1386664996, 1, 0),
(33, '13672239965', '955112', 1386665426, 1, 0),
(34, '13672239965', '329947', 1386665517, 1, 0),
(35, '13917087563', '886869', 1386669651, 1, 0),
(36, '13917087563', '686032', 1386669763, 1, 0),
(37, '13761951734', '585165', 1387030290, 1, 0),
(38, '13761951734', '892387', 1387030400, 1, 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
