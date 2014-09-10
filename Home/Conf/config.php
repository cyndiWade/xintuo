<?php
if (!defined('THINK_PATH'))exit();

$DB = require("config.inc.php");	//数据库配置

//系统配置
$system = array(
		//路由配置
		'URL_MODEL'             => 3,							//URL重写，兼容模式  如：home.php?s=/User/user   或者  home.php/User/user
		'URL_ROUTER_ON'   => true, 						//开启路由

		//session及时区配置
		'SESSION_AUTO_START' => true,				//session常开
		'DEFAULT_TIMEZONE'=>'Asia/Shanghai', 	// 设置默认时区
		
		'DEFAULT_MODULE'        => 'Login', // 默认模块名称
		'DEFAULT_ACTION'        => 'index', // 默认操作名称
		
		/*以下添加扩展配置*/
		'OUTPUT_ENCODE' => false,		//页面压缩输出
		'VAR_PAGE'=>'p',
		
		
		//上传文件目录
		'UPLOAD_DIR' => array(
				'web_dir' => $_SERVER['DOCUMENT_ROOT'],
				'image' => '/files/xingtuo/images/',		//图片地址
		),
		
		//外部文件访问地址(用来填写专用的文件服务器)
		'PUBLIC_VISIT' => array(
			//'DOMAIN' => 'http://192.168.1.27',			//域名地址
			'DOMAIN' =>	'http://'.$_SERVER['SERVER_NAME'],
			'DIR' => '/files/xingtuo/'							//项目文件目录
		),
		
		
		//客户端加密、解密钥匙
		'UNLOCAKING_KEY' => 'xingtuo',
		
		//用户类型
		'ACCOUNT_TYPE' => array (
			'ADMIN' => 0,			//管理员
			'USER' => 1,				//普通用户
			'Director' => 2,			//经理
		),
		
		//短信平台账号
		'SHP' => array(
 			'NAME'=>'kevin_shp',
 			'PWD'=>'kevin818'

//  		'NAME'=>'cheshen_gd',
//  		'PWD'=>'cheshen801'
 			
// 			'NAME'=>'lehuo_sz',
// 			'PWD'=>'lehuo8001'

// 			'NAME'=>'rikee',
// 			'PWD'=>'zyzylove2'
		),
		
		//即时通讯配置
		'OPEN_FIRE' => array (
				'host' => $_SERVER['SERVER_NAME'],
				'port' => '5222',
				'prefix' => 'notice_',	//账户前缀
		),
				
);


$result_status = array (
		
	'STATUS_SUCCESS' => '0',					//没有错误
	'STATUS_NOT_LOGIN'	=> '1002',			//未登录
	'STATUS_UPDATE_DATA'	=> '2001',		//没有成功修改数据
	'STATUS_NOT_DATA'	=> '2004',			//没有没有数据
	'STATUS_OTHER' => '9999',					//其他错误
	
);

return array_merge($DB, $system,$result_status);
?>