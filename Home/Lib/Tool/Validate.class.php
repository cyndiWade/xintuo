<?php

class Validate { //表单验证
		
	//是否为空
	static public function checkNull ($_data) {
		return trim($_data) == '';
	}
			
	//数字验证
	static public function checkNum ($_data) {
		return is_numeric($_data);
	}

	//账号验证
	static public function checkAccount($string) {								
		$check1 = preg_match("/^[A-Za-z][\w]{4,64}$/", $string);						//普通账号验证
		$check2 = preg_match("/^([\w\.\-]+)\@([\w]+)\.(com|cn)$/u", $string);	//邮箱验证

		if ($check1 || $check2) {
			return true;
		} else {
			return false;
		}		
	}
	
	//电话号码验证
	static public function checkPhone($string) {
		return preg_match("/^1[358]\d{9}$/", $string);
	}
	
	
	//长度是否合法
	static public function checkLength ($_data,$_length,$_flag) {
		if ($_flag == 'min') { //允许最小字符
			if (mb_strlen(trim($_data),'utf-8') <  $_length) return true;//字符串长度小于
			return false;
		} else if ($_flag == 'max') {//允许最大字符
			if (mb_strlen(trim($_data),'utf-8') >  $_length) return true;//字符串长度大于
			return false;
		} else if ($_flag == 'equals') {
			if (mb_strlen(trim($_data),'utf-8') != $_length) return true;
			return false;
		} else {//字符传值出错

		}
		
	}
			
	//二个提交的数据是否一致
	static public function checkEquals ($_data,$_otherdate) {
		if (trim($_data) == trim($_otherdate)) {
			return true;
		} else {
			return false;
		}

	}
			
	static public function checkemail ($_data) {
		$_zc = '/^[\w\-\.]+@[\w\-\.]+(\.\w+)+$/';
		return preg_match($_zc,$_data);

	}
			
		
	//账号验证
	static public function check_string_num($string) {
		$check = preg_match("/^[\w]+$/", $string);						//普通账号验证
		if ($check) {
			return true;
		} else {
			return false;
		}
	}
	
	//身份证验证
	static function check_identity($string) {
		$length = mb_strlen($string);
		if ($length == 15) {
			return preg_match("/^[1-9]\d{7}((0\d)|(1[0-2]))(([0|1|2]\d)|3[0-1])\d{3}$/", $string);
		} else if ($length ==18) {
			return preg_match("/^[1-9]\d{5}[1-9]\d{3}((0\d)|(1[0-2]))(([0|1|2]\d)|3[0-1])\d{3}(\d|x|X)$/", $string);
		}
	}

	
}




?>