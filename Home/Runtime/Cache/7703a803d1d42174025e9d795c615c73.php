<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html> 
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title>兴拓财富后台管理系统</title>
	
	<link type="text/css" href="<?php echo (APP_PATH); ?>Public/style.css" rel="stylesheet" />
	<link type="text/css" href="<?php echo (APP_PATH); ?>Public/css/login.css" rel="stylesheet" />
	
	<!--<script type='text/javascript' src='js/jquery-1.4.2.min.js'></script>	 jquery library -->
	<script type='text/javascript' src='<?php echo (APP_PATH); ?>Public/js/jquery-1.9.0.js'></script>	<!-- jquery library -->
	<script type='text/javascript' src="<?php echo (APP_PATH); ?>Public/js/jquery-migrate-1.2.1.js"></script>
	
	<script type='text/javascript' src='<?php echo (APP_PATH); ?>Public/js/iphone-style-checkboxes.js'></script> <!-- iphone like checkboxes -->

	<script type='text/javascript'>
		jQuery(document).ready(function() {
			jQuery('.iphone').iphoneStyle();
		});
	</script>
	
	<!--[if IE 8]>
		<script type='text/javascript' src='<?php echo (APP_PATH); ?>Public/js/excanvas.js'></script>
		<link rel="stylesheet" href="<?php echo (APP_PATH); ?>Public/css/loginIEfix.css" type="text/css" media="screen" />
	<![endif]--> 
 
	<!--[if IE 7]>
		<script type='text/javascript' src='<?php echo (APP_PATH); ?>Public/js/excanvas.js'></script>
		<link rel="stylesheet" href="<?php echo (APP_PATH); ?>Public/css/loginIEfix.css" type="text/css" media="screen" />
	<![endif]--> 
	
</head>
<body>
	
	
	<div id="line"><!-- --></div>
	<div id="background">
		<div id="container">
			<div id="logo">
				<img src="<?php echo (APP_PATH); ?>Public/assets/logologin.png" alt="Logo" />
			</div>
			<div id="box"> 
				<form action="?s=/Login/index" method="POST"> 
					<div class="one_half">
						<p><input name="account"  placeholder="请输入用户名" class="field"  /></p>
						<p>欢迎您，请输入账号密码登陆系统^_^</p> 
					</div>
					<div class="one_half last">
						<p><input type="password" name="password" placeholder="请输入密码" class="field" >	</p>
						<p><input type="submit" value="登录" class="login" /></p>
					</div>
				</form> 
		</div> 
		
		</div>
	</div>
	<div align="center">  <a href="http://www.baidu.com/"> </a> </div>
</body>
</html>