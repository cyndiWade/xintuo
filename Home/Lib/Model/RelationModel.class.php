<?php

/**
 * 客户与经理关系处理
 */
class RelationModel extends BaseModel {
	
	
	/**
	 * 获取客户经理下的所有用户,一对多的关系
	 * @param INT $director_id
	 */
	public function seek_user_from_director ($director_id) {
		
		$data = $this->field('u.account,u.name,ui.*')
		->table($this->prefix.'users AS u')
		->join($this->prefix.'user_info AS ui ON u.id = ui.user_id')
		->where(array('ui.director_id'=>$director_id))
		->select();
		return $data;
	}

	/**
	 * 获取客户所属的用户经理信息
	 * @param INT $user_id
	 */
	public function seek_director_from_user ($user_id) {
		$data = $this->field('u.account,u.name,ui.*')
		->table($this->prefix.'users AS u')
		->join($this->prefix.'user_info AS ui ON u.id = ui.user_id')
		->where('u.id = (SELECT director_id FROM '.$this->prefix.'user_info WHERE user_id='.$user_id.')')
		->select();
		return $data;
	}
	
	
	
}

?>
