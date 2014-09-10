jQuery.noConflict();

window.onscroll = function()
{
    if( window.XMLHttpRequest ) {
        if (document.documentElement.scrollTop > 0 || self.pageYOffset > 0) {
            jQuery('#primary_left').css('position','fixed');
            jQuery('#primary_left').css('top','0');
        } else if (document.documentElement.scrollTop < 0 || self.pageYOffset < 0) {
            jQuery('#primary_left').css('position','absolute');
            jQuery('#primary_left').css('top','175px');
        }
    }
}

function initMenu() {
    jQuery('#menu ul ul').hide();
	//jQuery('#menu ul li').click(function() {
	//	jQuery(this).parent().find("ul").slideUp('fast');
	//	jQuery(this).parent().find("li").removeClass("current");
	//	jQuery(this).find("ul").slideToggle('fast');
	//	jQuery(this).toggleClass("current");
 	//});
}
 
 
jQuery(function() {
	
	//Cufon.replace('h1, h2, h5, .notification strong', { hover: 'true' }); // Cufon font replacement
	initMenu(); // Initialize the menu!
	
	jQuery(".tablesorter").tablesorter(); // Tablesorter plugin
		
	jQuery('.notification').hover(function() {
 		jQuery(this).css('cursor','pointer');
 	}, function() {
		jQuery(this).css('cursor','auto');
	}); // Close notifications
			
	jQuery('.checkall').click(
		function(){
			jQuery(this).parent().parent().parent().parent().find("input[type='checkbox']").attr('checked', jQuery(this).is(':checked'));   
		}
	); // Top checkbox in a table will select all other checkboxes in a specified column
			
	jQuery('.iphone').iphoneStyle(); //iPhone like checkboxes

	jQuery('.notification span').click(function() {
		jQuery(this).parents('.notification').fadeOut(800);
	}); // Close notifications on clicking the X button
			
	jQuery(".tooltip").easyTooltip({
		xOffset: -60,
		yOffset: 70
	}); // Tooltips! 
			
	jQuery('#menu li:not(".current"), #menu ul ul li a').hover(function() {
		jQuery(this).find('span').animate({ marginLeft: '5px' }, 100);
	}, function() {
		jQuery(this).find('span').animate({ marginLeft: '0px' }, 100);           
	}); // Menu simple animation
			
	jQuery('.fade_hover').hover(
		function() {
			jQuery(this).stop().animate({opacity:0.6},200);
		},
		function() {
			jQuery(this).stop().animate({opacity:1},200);
		}
	); // The fade function
			
	//sortable, portlets
	jQuery(".column").sortable({
		connectWith: '.column',
		placeholder: 'ui-sortable-placeholder',
		forcePlaceholderSize: true,
		scroll: false,
		helper: 'clone'
	});
				
	jQuery(".portlet").addClass("ui-widget ui-widget-content ui-helper-clearfix ui-corner-all").find(".portlet-header").addClass("ui-widget-header ui-corner-all").prepend('<span class="ui-icon ui-icon-circle-arrow-s"></span>').end().find(".portlet-content");

	jQuery(".portlet-header .ui-icon").click(function() {
	//	jQuery(this).toggleClass("ui-icon-minusthick");
		//jQuery(this).parents(".portlet:first").find(".portlet-content").toggle();
	});

	jQuery(".column").disableSelection();
	
	jQuery("table.stats").each(function() {
		if(jQuery(this).attr('rel')) { var statsType = jQuery(this).attr('rel'); }
		else { var statsType = 'area'; }
		
		var chart_width = (jQuery(this).parent().parent(".ui-widget").width()) - 60;
		jQuery(this).hide().visualize({		
			type: statsType,	// 'bar', 'area', 'pie', 'line'
			width: '800px',
			height: '240px',
			colors: ['#6fb9e8', '#ec8526', '#9dc453', '#ddd74c']
		}); // used with the visualize plugin. Statistics.
	});
			
	jQuery(".tabs").tabs(); // Enable tabs on all '.tabs' classes
	
	jQuery( ".datepicker" ).datepicker();
	
	jQuery(".editor").cleditor({
		width: '800px'
	}); // The WYSIWYG editor for '.editor' classes
	
	// Slider
	jQuery(".slider").slider({
		range: true,
		values: [20, 70]
	});
				
	// Progressbar
	jQuery(".progressbar").progressbar({
		value: 40 
	});
	
	
	
	/**
	 * 导航样式控制
	 * @param {Object} $
	 */
	(function ($) {
		
		/**
		 * 1、导航样式
		 */
		var cookie = new Cookie();		//Cookie封装	
		var arrLi = $('ul.all_menu').children();	
		arrLi.click(function () {
			cookie.setCookie('menu_name',$(this).data('menu_name'));		//保存导航名到Cookie
		});

		var menu_name = cookie.getCookie('menu_name');						//读取COOkie中的值
		$.each(arrLi,function (key) {		
			var _this = $(this);
			if (menu_name == _this.data('menu_name')) {
				_this.find('ul').effect('clip',{direction:'vertical',mode:'show'},'slow');		//子导航弹出动画效果
				_this.addClass('current');					//导航栏加样式
				return false;
			} 
		});


		/**
		 * 2、删除操作确认
		 */
		var deleteBtn = $('.delete');
		deleteBtn.click(function () {
			return confirm('确定要删除吗？');
		});



		/**
		 * 3、拖动编辑客户与客户经理关系
		 */
		//选择元素
		var arr_users = $('div.users');			//拖动的元素
		var director = $('#Director');				//客户经理管理的用户盒子
		var users = $('#User');						//待管理的用户盒子
		
		//修改客户隶属关系
		var AJAX_SaveUserRelation = function (user_id,director_id) {
			$.post('?s=/Director/AJAX_SaveUserRelation/',{
				'user_id' : user_id,
				'director_id' : director_id
			});	
		}
		
		//流程控制
		var action = function () {
			var _this = this;						//1.保存正在被拖动的元素对象。
			//设置放置元素 。
			var options = {			//2.选取目标区域的元素
				//attr 属性设置

				tolerance:'intersect',				//设置可放置元素进入目标区域的范围值			
		//		activeClass:'redBorder',		//(css类名 多个空格分开)	移动可放置的元素时，改变目标区域的样式。
		//		hoverClass:'bronze', 			//(css类名 多个空格分开)	移动可放置的元素时，放置在目标区域时改变目标区域颜色
									
				//fn 函数设置。这里this指针，指向目标区域的对象
				activate : function () {			//拖动开始		触发函数	

				//	arr_users.css('z-index',0);
					//$(_this).css('z-index',9999);
					//$(_this).css('background','red');
				},		
				over : function () {					//进入目标区域   触发函数
				
				},
				out : function () {						//移除目标区域	触发函数
					users.append(_this); 
					
					AJAX_SaveUserRelation($(_this).data('user_id'),0);
				},
				drop : function (event,info) {	//停在目标区域
					director.append(_this); 
	
					AJAX_SaveUserRelation($(_this).data('user_id'),$('#director_id').val());
				}
			};	
			director.droppable(options);		//放置区域						
		};
		
		//选中可以被拖动的元素
		arr_users.draggable({		
			helper: 'clone',	
			opacity: 0.5,
		//	revert: true,
			start : action	 	//执行函数
		});

		
		//回答问题模块
		(function () {
			var options = {
					//打开特效、关闭特效动画	
					autoOpen: false,
			
					modal : true,					//对话框开启期间，阻止交互
					position:'center',			//设置打开的位置参数有：left 、 right、bottom  
					//title : '123',					//设置对话框的标题名，也可以在标签中自定义
	
					width: '650',			//宽度  默认300
					
					//创建自定义按钮函数
					buttons:{
						'知道了':function (event) {		
							$(this).dialog('close');
						},
						'关闭':function (event) {		
							$(this).dialog('close');
						},
					},
				};
			
			
			$('#dialog').dialog(options); // Default dialog. Each should have it's own instance.
					
			$('.dialog_link').click(function(){
				jQuery('#dialog').dialog('open');
				return false;
			}); // Toggle dialog
			
		})();

		
		/* 改变用于与产品的关系 */
		var chang_product_user = function  () {
			var event_iphone = $('.event_iphone');
			
			event_iphone.iphoneStyle();
			event_iphone.parent().click(function () {
				var _this = $(this);
				var input = _this.find('input');

				var data = {};
				data.product_id = $('#product_id').val();
				data.users_id =  input.val();
				
				var result = ajax_post_setup('?s=/Product/AJAX_Set_Product_User/',data);
				
				if (result.status != 0) {
					alert(result.msg);
				}
			});
		}();
		

		/* 改变用户与产品经理关系模块 */
		var change_director_user = function () {
			var change_director_user = $('.change_director_user');
			change_director_user.iphoneStyle();
			
			change_director_user.parent().click(function () {
				var _this = $(this);
				var input = _this.find('input');

				var data = {};
				data.director_id = $('#director_id').val();
				data.user_id =  input.val();

				var result = ajax_post_setup('?s=/DirectorUser/AJAX_Change_Relevance/',data);
				
				if (result.status != 0) {
					alert(result.msg);
				}
			});
			
		}();
		

	})(jQuery);
	
	
	
	
	
	
	
	
	
	
	
	
});




