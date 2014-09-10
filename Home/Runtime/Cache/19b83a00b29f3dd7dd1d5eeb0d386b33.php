<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html> 
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>兴拓财富后台管理系统</title>
	<!-- 头文件 -->
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" /> 
	
	<link type="text/css" href="<?php echo (APP_PATH); ?>Public/style.css" rel="stylesheet" /> <!-- the layout css file -->
	<link type="text/css" href="<?php echo (APP_PATH); ?>Public/css/jquery.cleditor.css" rel="stylesheet" />
	
	<script type='text/javascript' src='<?php echo (APP_PATH); ?>Public/js/jquery-1.9.0.js'></script>	<!-- jquery library -->
	<script type='text/javascript' src="<?php echo (APP_PATH); ?>Public/js/jquery-migrate-1.2.1.js"></script> <!-- 向下兼容包 -->

	<script type='text/javascript' src='<?php echo (APP_PATH); ?>Public/js/jquery-ui-1.10.0.custom.min.js'></script> <!-- jquery UI -->

	<script type='text/javascript' src='<?php echo (APP_PATH); ?>Public/js/cufon-yui.js'></script> <!-- Cufon font replacement -->
	<script type='text/javascript' src='<?php echo (APP_PATH); ?>Public/js/ColaborateLight_400.font.js'></script> <!-- the Colaborate Light font -->
	<script type='text/javascript' src='<?php echo (APP_PATH); ?>Public/js/easyTooltip.js'></script> <!-- element tooltips -->
	<script type='text/javascript' src='<?php echo (APP_PATH); ?>Public/js/jquery.tablesorter.min.js'></script> <!-- tablesorter -->
	
	<!--[if IE 8]>
		<script type='text/javascript' src='<?php echo (APP_PATH); ?>Public/js/excanvas.js'></script>
		<link rel="stylesheet" href="<?php echo (APP_PATH); ?>Public/css/IEfix.css" type="text/css" media="screen" />
	<![endif]--> 
 
	<!--[if IE 7]>
		<script type='text/javascript' src='<?php echo (APP_PATH); ?>Public/js/excanvas.js'></script>
		<link rel="stylesheet" href="<?php echo (APP_PATH); ?>Public/css/IEfix.css" type="text/css" media="screen" />
	<![endif]--> 
	
	<script type='text/javascript' src='<?php echo (APP_PATH); ?>Public/js/visualize.jQuery.js'></script> <!-- visualize plugin for graphs / statistics -->
	<script type='text/javascript' src='<?php echo (APP_PATH); ?>Public/js/iphone-style-checkboxes.js'></script> <!-- iphone like checkboxes -->
	<script type='text/javascript' src='<?php echo (APP_PATH); ?>Public/js/jquery.cleditor.min.js'></script> <!-- wysiwyg editor -->
	
	<script type='text/javascript' src='<?php echo (APP_PATH); ?>Public/js/function.js'></script> <!-- 函数库 -->
	<script type='text/javascript' src='<?php echo (APP_PATH); ?>Public/js/custom.js'></script> <!-- the "make them work" script -->
	
	<style type="text/css">
		.dropdown {
			width:200px;
		}
	</style>
	

	<style type="text/css">

.cleditorMain {
	height: 250px;
    width: 800px;
    background-color: #FBFBFB;
    border: 1px solid #ccc;
    border-radius: 5px 5px 5px 5px;
    box-shadow: 1px 1px 0 #999999;
    margin-bottom: 15px;
    margin-left: 2px;
    padding: 0 1px 1px;
}

	</style>
</head>

<body>

	<div id="container">
		<div id="bgwrap">
			
			<!-- 导航文件 -->
						<!-- 左侧导航 -->
			<div id="primary_left">
        
				<div id="logo">
					<a href="index.html" title="Dashboard"><img src="<?php echo (APP_PATH); ?>Public/assets/logo.png" alt="" /></a>
				</div> <!-- logo end -->

				<div id="menu"> <!-- navigation menu -->
				
				<!-- class="current"-->
					<ul class="all_menu">
						
						<li  data-menu_name="系统">
							<a href="?s=/System/index" >
								<img src="<?php echo (APP_PATH); ?>Public/assets/icons/small_icons_3/dashboard.png" alt=""/>
								<span class="current">系统</span>
							</a>
						</li>
						
						<li  data-menu_name="用户管理">
							<a href="?s=/User/user_list/">
								<img src="<?php echo (APP_PATH); ?>Public/assets/icons/small_icons_3/coin.png" alt=""/>
								<span>用户管理</span>
							</a>
							<ul class="dashboard">
								<li><a href="?s=/User/user_add/type/user">添加用户</a></li>
							</ul>
						</li>

						<li data-menu_name="客户经理">
							<a href="?s=/User/user_list/type/2">
								<img src="<?php echo (APP_PATH); ?>Public/assets/icons/small_icons_3/users.png" alt=""/>
								<span>客户经理</span>
							</a>
							<ul class="dashboard">
								<li><a href="?s=/User/user_add/type/director">添加经理</a></li>
							</ul>
						</li>
						
						<li data-menu_name="客户提问">
							<a href="?s=/Message/index/">
								<img src="<?php echo (APP_PATH); ?>Public/assets/icons/small_icons_3/posts.png" alt="" />
								<span>用户提问</span>
							</a>
						</li>
						
						<li  data-menu_name="理财产品">
							<a href="?s=/Product/index/">
								<img src="<?php echo (APP_PATH); ?>Public/assets/icons/small_icons_3/notes.png" alt="" />
								<span>理财产品</span>
							</a>
							<ul class="dashboard">
								<li><a href="?s=/Product/edit/act/add/">添加理财产品</a></li>
							</ul>
						</li>
						
						<li  data-menu_name="新闻资讯">
							<a href="?s=/News/index">
								<img src="<?php echo (APP_PATH); ?>Public/assets/icons/small_icons_3/media.png" alt="" />
								<span>新闻资讯</span>
							</a>
							<ul class="dashboard">
								<li><a href="?s=/News/edit/act/add">添加新闻</a></li>
							</ul>
						</li>
						
						<li  data-menu_name="广告相关">
							<a href="?s=/Advertisement/index">
								<img src="<?php echo (APP_PATH); ?>Public/assets/icons/dashboard/18.png" alt="" />
								<span>广告相关</span>
							</a>
							<ul class="dashboard">
								<li><a href="?s=/Advertisement/edit/act/add">添加广告</a></li>
							</ul>
						</li>

						

						<li  data-menu_name="推送消息">
							<a href="?s=/Send/index">
								<img src="<?php echo (APP_PATH); ?>Public/assets/icons/small_icons_3/settings.png" alt="" />
								<span>推送消息</span>
							</a>
						</li>


					</ul>
				</div> <!-- navigation menu end -->
			</div> <!-- sidebar end -->
			
			<!-- 右侧主体 -->
			<div id="primary_right">
				<div class="inner">
		
				<div class="notification warning"> 
					<span></span> 
					<div class="text"> 
						<p><strong>注意：</strong>请慎重填写推送内容</p> 
					</div> 
				</div> 
			
				<form action="?s=/Send/index" method="post">

					<fieldset>
						<legend>推送消息</legend>

						<p><label>编辑推送内容</label></p>
						<textarea class="cleditorMain" name="content"></textarea>
						
						<div class="clearboth"></div>
						
						<p><input class="button" type="submit" value="确认推送" /></p>
					</fieldset>
				</form>
					<div class="clearboth"></div>



				</div> <!-- inner -->
			</div> <!-- primary_right -->
			
		</div> <!-- bgwrap -->
	</div> <!-- container -->
</body>
</html>