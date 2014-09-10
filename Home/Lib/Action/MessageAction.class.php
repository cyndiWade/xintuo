<?php
/**
 * 回答用户提问模块
 * @author Administrator
 *
 */
class MessageAction extends HtmlBaseAction {
    
	//需要身份验证的模块
	protected $aVerify = array(
		'index',
		'receive_question',
		'question_del',
	);

	
	//获取所有提问列表
	public function index () {
		$Question = D('Question');			//问题表
	
		/**
		 * 用户搜索
		 */
		foreach ($_POST AS $key=>$val) {
			if ($val != '') {
				$map[$key] = $val;
			}
		}
		$map['status'] = 0;
		//获取内容列表
		$list = $Question->field('id,user_id,content,time,is_reply')->where($map)->order('id DESC')->select();
		
		foreach ($list AS $key=>$val) {
			$val['is_reply'] == 1 ? $list[$key]['is_reply'] = '<span style="color:red;">待回复</span>' : $list[$key]['is_reply'] = '已回复';

			$list[$key]['time'] = date('Y-m-d H:i:s',$val['time']);

		}
		
		$this->assign('list',$list);
		$this->display();
	}
	
	
	//回复用户消息
	public function receive_question () {

		//参数
		$qid = $this->_get('qid');
		$user_id = $this->_get('user_id');
		$my_uid = $this->oUser->id;
		
		if (empty($qid) || (!is_numeric($qid)) || empty($user_id) || (!is_numeric($user_id))) {
			$this->error('非法操作！');
		}  
		
		$Question = D('Question');			//问题表
		$Message = D('Message');			//消息表
		
		if ($this->isPost()) {
			$mess_id = $Message->seek_is_have($qid);
			if (empty($_POST['content'])) $this->error('回复内容不得为空！');

			$Message->create();
			
			if ($mess_id == true) {		//修改回复消息
				$Message->where(array('id'=>$mess_id))->save() ? $this->success('修改成功!') : $this->error('没有做出修改！');
			} else {	//添加回复消息
				$Message->qid = $qid;	
				$Message->user_id = $user_id;
				$Message->send_uid = $my_uid;
				$Message->time = time();
				if($Message->where(array('id'=>$mess_id))->add()) {
					$Question->update_reply($qid);
					$this->success('回复成功！');
				} else {
					$this->error('回复失败，请重新尝试！');
				}
			}
			exit;
		} else {
			//读取数据
			$map['qid'] = $qid;
			$content = $Message->where($map)->getField('content');
			$this->assign('content',$content);
			$this->display();
		}
	
		
	}
	
	
	public function question_del () {
		$qid = $this->_get('qid');
		if (empty($qid) || (!is_numeric($qid)) ) {
			$this->error('非法操作！');
		}
		
		$Question = D('Question');			//问题表
		$Question->del(array('id'=>$qid)) ? $this->success('删除成功！!') : $this->error('删除失败！');
		exit;
	}

	
}