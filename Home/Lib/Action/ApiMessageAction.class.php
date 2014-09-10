<?php

/**
 * 新消息模块
 */
class ApiMessageAction extends ApiBaseAction {
	
	//需要身份验证的模块
	protected $aVerify = array(
		'message_list',
	);
	
	
	//获取提问与消息列表
	public function message_list () {
		$DB = M();
		$user_id = $this->oUser->id;	//用户消息
		$all_data  = 
		$DB->table('xt_question AS q')
		->join('xt_message AS m ON q.id=m.qid')
		->field('q.content AS question,m.content')
		->where(array('q.user_id'=>$user_id,'q.status'=>0))
		->order('m.id DESC')
		->select();

		if ($all_data) {
			parent::callback(C('STATUS_SUCCESS'),'获取成功',$all_data);
		} else {
			parent::callback(C('STATUS_NOT_DATA'),'没有任何消息');
		}

	}
	
	


	
	
/**
 * 管理员功能
 */	
	
	//提问的问题列表
	public function receive_list () {
	
		$Question = D('Question');			//问题表
		$type = $this->_get('type');
		isset($type) ? $type : $type = 1;		//默认为，获取未回答的问题列表
				
		$list = $Question->seek_question_all_data($type);		//获取所有未回答问题数据
		
		if ($list) {
			parent::callback(C('STATUS_SUCCESS'),'获取成功',$list);
		} else {
			parent::callback(C('STATUS_NOT_DATA'),'没有任何消息');
		}
	}
	
	
	//回复用户消息
	public function receive_question () {
		$Message = D('Message');			//消息表
		
		if ($this->isPost()) {
			
			
		} else {
			
		}
		
		$this->display('Login:receive_message');
	}

	
}

?>