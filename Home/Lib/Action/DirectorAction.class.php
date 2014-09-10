<?php
/**
 * 客户经理管理器
 * @author Administrator
 *
 */
class DirectorAction extends HtmlBaseAction {
    
	
	//需要身份验证的模块
	protected $aVerify = array(
		'relation'
	);

	//关系
	public function relation () {
		//数据验证
		$Users = D('Users');
		$id = $this->_get('id');	//客户经理id
		//查找是否为客户经理
		$director_info = $Users->where(array('status'=>0,'id'=>$id,'type'=>C('ACCOUNT_TYPE.Director')))->getField('id');
		if ((empty($id)) || (!is_numeric($id)) || (empty($director_info))) {
			$this->error('非法操作！');
		}

/**		
		//获取客户经理下的用户ID
		$relation = $DirectorUser->get_director_user($id);
		$user_ids = getArrayByField($relation,'user_id');

		//获取所有用户
		$map1['u.status'] = 0;
		$map1['u.type'] = C('ACCOUNT_TYPE.USER');
		$all_users = $Users->seek_user_data($map1);
		parent::public_file_dir($all_users,'file_address','images/');		//组合图片访问地址
		
		$list_one = array();		//存放已被客户经理管理的用户
		$list_two = array();		//存放未被客户经理管理的用户
		foreach ($all_users AS $key=>$val) {
			if (in_array($val['id'],$user_ids)) {
				array_push($list_one,$val);
			} else {
				array_push($list_two,$val);
			}
		}
*/		

		//获取当前客户经理下已有的客户列表
		$map1['u.status'] = 0;
		$map1['u.type'] = C('ACCOUNT_TYPE.USER');		
		$map1['i.director_id'] = $id;
		$list_one = $Users->seek_user_data($map1);
		parent::public_file_dir($list_one,'file_address','images/');		//组合图片访问地址
		
		//获取待非配，暂无客户经理的用户
		$map2['u.status'] = 0;
		$map2['u.type'] = C('ACCOUNT_TYPE.USER');
		$map2['i.director_id'] = 0;
		$list_two = $Users->seek_user_data($map2);
		parent::public_file_dir($list_two,'file_address','images/');		//组合图片访问地址

		$this->assign('id',$id);
		$this->assign('list_one',$list_one);
		$this->assign('list_two',$list_two);
		$this->display();
		
	}
	
	//修改客户关系
	public function AJAX_SaveUserRelation () {
		/**
		if ($this->isPost()) {
			$DirectorUser = D('DirectorUser');
			$DirectorUser->change_relevance($_POST['director_id'],$_POST['user_id']);			
			$user_id = $_POST['user_id'];					//用户ID
			$director_id = $_POST['director_id'];		//商务经理ID	
			echo $UserInfo->where(array('user_id'=>$user_id))->setField(array('director_id'=>$director_id));
		}
		*/
		
	
		if ($this->isPost()) {
			$UserInfo = D('UserInfo');
			$user_id = $_POST['user_id'];					//用户ID
			$director_id = $_POST['director_id'];		//商务经理ID
		
			echo $UserInfo->where(array('user_id'=>$user_id))->setField(array('director_id'=>$director_id));			
		}
	
		
		
	}

	

}