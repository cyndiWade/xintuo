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
		.dropdown {
			width:200px;
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
			
				<form action="" method="post">

					<fieldset>
						<legend>编辑用户信息</legend>
						
						<p>
							<label>账号:</label>
							<input class="sf" type="text" disabled="disabled" value="<?php echo ($user_info["account"]); ?>" />
							<span class="field_desc"></span>
						</p>
						
						<p>
							<label>身份:</label>
							<input class="sf" type="text" disabled="disabled" value="<?php echo ($user_info["type"]); ?>" />
							<span class="field_desc"></span>
						</p>
						
						<p>
							<label>密码:</label>
							<input class="sf" type="password" name="password_one"  />
							<span class="validate_success">不填写则不修改</span>
						</p>
						<p>
							<label>确认密码:</label>
							<input class="sf" type="password" name="password_two"  />
							<span class="field_desc"></span>
						</p>
						
						<p>
								<label>姓名:</label>
								<input class="sf" type="text" name="name" value="<?php echo ($user_info["name"]); ?>" />
								<span class="validate_success"></span>
							</p>
							
							<p>
								<label>身份证:</label>
								<input class="sf" type="text" name="identity"  value="<?php echo ($user_info["identity"]); ?>"/>
								<span class="validate_success"></span>
							</p>
					

						<p>
							<label>年龄:</label>
							<select name="age" class="dropdown">	
							
								<?php $__FOR_START_19263__=1;$__FOR_END_19263__=101;for($i=$__FOR_START_19263__;$i < $__FOR_END_19263__;$i+=1){ if(($i == $user_info['age']) ): ?><option value="<?php echo ($i); ?>" selected=selected><?php echo ($i); ?></option>
									<?php else: ?>
										<option value="<?php echo ($i); ?>" ><?php echo ($i); ?></option><?php endif; } ?>
								
							</select>
						</p>

						<p>
							<label>性别:</label>
							
							<?php if(($user_info['sex'] == '男')): $checked1 = 'checked=checked'; ?>
							<?php elseif(($user_info['sex'] == '女')): ?>
								<?php $checked2 = 'checked=checked'; endif; ?>
							
							<input type="radio" name="sex" value="男" <?php echo ($checked1); ?>/>男
							<input type="radio" name="sex" value="女" <?php echo ($checked2); ?>/>女
						</p>
						
						<p>
							<label>电子邮箱:</label>
							<input class="sf" name="email" type="text" value="<?php echo ($user_info["email"]); ?>" /> 
							<span class="validate_error"></span>
						</p>
						
						<p>
							<label>省份:</label>
							<input class="sf" name="province" type="text" value="<?php echo ($user_info["province"]); ?>" /> 
							<span class="validate_error"></span>
						</p>
						
						<p>
							<label>城市:</label>
							<input class="sf" name="city" type="text" value="<?php echo ($user_info["city"]); ?>" /> 
							<span class="validate_error"></span>
						</p>
							
						<p>
							<label>街道地址:</label>
							<input class="sf" name="street" type="text" value="<?php echo ($user_info["street"]); ?>" /> 
							<span class="validate_error"></span>
						</p>
						
						<p>
							<label>感兴趣的产品:</label>
							<input class="sf" name="interest" type="text" value="<?php echo ($user_info["interest"]); ?>" /> 
							<span class="validate_error"></span>
						</p>
						
						<p>
							<label>已购买的产品:</label>
							<input class="sf" name="purchase" type="text" value="<?php echo ($user_info["purchase"]); ?>" /> 
							<span class="validate_error"></span>
						</p>
						
						<p><label>备注信息:</label></p>
						<textarea class="editor" name="remarks"><?php echo ($user_info["remarks"]); ?></textarea>
						
						<div class="clearboth"></div>
						
						<p><input class="button" type="submit" value="确认提交" />
						 <input class="button" type="reset" value="重填" /></p>
					</fieldset>
				</form>
					<div class="clearboth"></div>



				</div> <!-- inner -->
			</div> <!-- primary_right -->
			
		</div> <!-- bgwrap -->
	</div> <!-- container -->
</body>
</html>