<?php
/**
 *	客户与经理关系
 *
 */
class ApiRelationAction extends ApiBaseAction {
    
	//需要验证的模块
	protected $aVerify = array(
		'get_user_from_director',
		'get_director_from_user'
	);
	
	/**
	 * 组合XMPP通讯账号
	 * @param unknown_type $all
	 * @param unknown_type $fields
	 * @param unknown_type $default
	 */
	private function xmpp_accout(&$all,$fields,$default = 'xmpp_account') {
		if (empty($all)) return false;
		/* 多维数组 */
		if (count($all[0]) >=1)  {
			foreach ($all AS $key=>$val) {
				for ($i=0;$i<count($fields);$i++) {
					if (empty($all[$key][$fields[$i]])) continue;
					$all[$key][$default] = $all[$key][$fields[$i]].'@'.C('OPEN_FIRE.host');
				}
			}
		/* 一维数组 */	
		} else {
			for ($i=0;$i<count($fields);$i++) {
				if (empty($all[$fields[$i]])) continue;
				$all[$fields[$default]] = $all[$key][$fields[$i]].'@'.C('OPEN_FIRE.host');
			}
		}	
		
	}

	/**
	 * 获取经理下的用户
	 */
	public function get_user_from_director () {
		$DirectorUser = D('DirectorUser');		//经理用户关系表
		
		$user_list = $DirectorUser->get_DirectorUser($this->oUser->id);
		$this->xmpp_accout($user_list,array('account'));
		empty ($user_list) ?  parent::callback(C('STATUS_NOT_DATA'),'没有数据') : parent::callback(C('STATUS_SUCCESS'),'获取成功',$user_list);

		/**
		$Relation = D('Relation');
		$list = $Relation->seek_user_from_director($this->oUser->id);
		
		$this->xmpp_accout($list,array('account'));
		empty ($list) ?  parent::callback(C('STATUS_NOT_DATA'),'没有数据') : parent::callback(C('STATUS_SUCCESS'),'获取成功',$list);
		*/
	}
    
	
	/**
	 * 获取用户隶属的客服经理
	 */
	public function get_director_from_user () {
		
		$DirectorUser = D('DirectorUser');		//经理用户关系表
		$director_list = $DirectorUser->seek_director_from_user($this->oUser->id);
		
		$this->xmpp_accout($director_list,array('account'));
		empty ($director_list) ? parent::callback(C('STATUS_NOT_DATA'),'没有数据') : parent::callback(C('STATUS_SUCCESS'),'获取成功',$director_list);
		
		/**
		$Relation = D('Relation');
		$list = $Relation->seek_director_from_user($this->oUser->id);
		
		$this->xmpp_accout($list,array('account'));
		empty ($list) ? parent::callback(C('STATUS_NOT_DATA'),'没有数据') : parent::callback(C('STATUS_SUCCESS'),'获取成功',$list);
		*/
	}
	
}