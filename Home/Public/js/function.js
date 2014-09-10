//cookie操作
//两个参数，一个是cookie的名子，一个是值
function Cookie(name,val) {
	//this.name = name;
	//this.val = val;
}

Cookie.prototype.setCookie = function (name,value) {//添加方法
	var Days = 30; 				//此 cookie 将被保存 30 天
	var exp = new Date();    //new Date("December 31, 9998");
	exp.setTime(exp.getTime() + Days*24*60*60*1000);
	document.cookie = name + "="+ escape (value) + ";expires=" + exp.toGMTString();
}

//取cookies函数qwe
Cookie.prototype.getCookie = function (name)  {
	var arr = document.cookie.match(new RegExp("(^| )"+name+"=([^;]*)(;|$)"));
	if(arr != null) return unescape(arr[2]); return null;
}


//取cookies函数
Cookie.prototype.delCookie = function(name) {//删除cookie
	var exp = new Date();
	exp.setTime(exp.getTime() - 1);
	var cval=this.getCookie(name);
	if(cval!=null) document.cookie= name + "="+cval+";expires="+exp.toGMTString();
}



/**
 * 同步模式AJAX提交
 */
var ajax_post_setup = function ($url,$data) {
	var $ = jQuery;
	$.ajaxSetup({
		async: false,//async:false 同步请求  true为异步请求
	});
	var result = false;
	//提交的地址，post传入的参数
	$.post($url,$data,function(content){
		result = content;
	},'json');
	return result;
}

