<?php

/**
 * 核心类基础类
 */
class BaseAction extends Action {
	
	/**
	 * 构造方法
	 */
	public function __construct() {
		parent:: __construct();			//重写父类构造方法
		
	}

	
	/**
	 * 组合图片外部访问地址
	 * @param Array $arr								//要组合地址的数组
	 * @param String Or Array	 $field			//组合的字段key  如：pic 或  array('pic','head')
	 * @param String $dir_type						//目录类型  如：/images
	 */
	protected function public_file_dir (Array &$arr,$field,$dir_type) {
		$public_file_dir =  C('PUBLIC_VISIT.DOMAIN').C('PUBLIC_VISIT.DIR').$dir_type;			//域名、文件目录
		
		//递归
		if (is_array($field)) {		
			for ($i=0;$i<count($field);$i++) {
				self::public_file_dir($arr,$field[$i],$dir_type);
			}			
		} else {	
			foreach ($arr AS $key=>$val) {
				if (empty($arr[$key][$field])) continue;
				$arr[$key][$field] = $public_file_dir.$val[$field];
			}
		}
	}
	
	
	/**
	 * 系统消息通知与查询
	 * @param array $arr	//通知内容
	 */
	protected function system_message(Array $arr) {
		$SystemMessage = D('SystemMessage');		//系统消息表
	
		if ($arr['type'] == 'notify') {		//添加通知信息
			return $SystemMessage->add_message_data($arr['user_id'],$arr['content']);
		} elseif ($arr['type'] == 'seek') {		//查询通知信息
			return $SystemMessage->seek_message_date($arr['user_id']);
		}
	
	}
	
	/**
	 * 统一数据返回
	 * @param unknown_type $status
	 * @param unknown_type $msg
	 * @param unknown_type $data
	 */
	protected function callback($status, $msg = 'Yes!',$data = array()) {
		$return = array(
				'status' => $status,
				'msg' => $msg,
				'data' => $data,
				'num' => count($data),
		);
	
		//	header('Content-Type:text/html;charset=utf-8');
		header('Content-Type:application/json;charset=utf-8');
	
		//die(json_encode($return));
		die(JSON($return));
	}
	
	
}


?>