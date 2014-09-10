<?php
/**
 * 经理与客户关系编辑
 */
class DirectorUserAction extends HtmlBaseAction {
    
	//需要身份验证的模块
	protected $aVerify = array(
		'director_user'
	);
	
	/**
	 * 分配用户到客户经理下
	 */
	public function director_user () {
		$id = $this->_get('id');			//经理ID
		$DirectorUser = D('DirectorUser');		//经理用户关系表
		$Users = D('Users');
		
		//查找是否为客户经理
		$director_info = $Users->field('id,account,name')->where(array('status'=>0,'id'=>$id,'type'=>C('ACCOUNT_TYPE.Director')))->find();
		if ((empty($id)) || (!is_numeric($id)) || (empty($director_info))) {
			$this->error('客户经理不存在！');
		}

		//查找指定的用户数据
		$map['u.type']  = 1;//筛选条件
		$map['u.status'] = 0;
		$list = $Users->seek_user_data($map);
	
		if ($list) {
			$relation = $DirectorUser->get_director_user($id);
			$user_ids = getArrayByField($relation,'user_id');
			
	
			foreach ($list AS $key=>$val) {
				if (in_array($val['id'],$user_ids)) {
					$list[$key]['checked'] = 'checked="checked"';
				}
			}
		}
		
		$this->assign('director_id',$id);
		$this->assign('header',$director_info['account']);
		$this->assign('list',$list);
		$this->display();
		
	}
	
	
	/**
	 * AJAX设置用户与产品关系
	 */
	public function AJAX_Change_Relevance () {
		
		if ($this->isPost()) {
			$DirectorUser = D('DirectorUser');	
			$user_id = $_POST['user_id'];					//用户ID
			$director_id = $_POST['director_id'];		//商务经理ID
			$status = $DirectorUser->change_relevance($director_id,$user_id);
			$status ? parent::callback(C('STATUS_SUCCESS'),'成功！') : parent::callback(C('STATUS_UPDATE_DATA'),'数据修改失败！');
		} else {
			parent::callback(C('STATUS_OTHER'),'非法访问！');
		}
	}
	


	
	
}