<?php

/**
 * 产品经理与用户关系表
 */
class DirectorUserModel extends BaseModel {
	
	
	/**
	 * 获取客户经理与用户的关系
	 */
	public function get_director_user ($director_id) {
		$data = $this->field('user_id')->where(array('director_id'=>$director_id))->select();
		return $data;
	}
	
	
	/**
	 * 获取产品经理下的用户
	 */
	public function get_DirectorUser ($director_id) {
		$data = $this->field('u.account,u.name,ui.age,ui.sex,ui.email,ui.province,ui.city,ui.street,ui.interest')
		->table($this->prefix.'director_user AS du')
		->join($this->prefix.'users AS u ON u.id=du.user_id')
		->join($this->prefix.'user_info AS ui ON ui.user_id = u.id')
		->where(array('du.director_id'=>$director_id))
		->select();
		return $data;
	}
	
	
	/**
	 * 获取客户所属经理数据
	 */
	public function seek_director_from_user ($user_id) {
		$data = $this->field('u.account,u.name,ui.age,ui.sex,ui.email,ui.province,ui.city,ui.street,ui.interest')
		->table($this->prefix.'director_user AS du')
		->join($this->prefix.'users AS u ON u.id=du.director_id')
		->join($this->prefix.'user_info AS ui ON ui.user_id = u.id')
		->where(array('du.user_id'=>$user_id))
		->select();
		return $data;
		
	}
	
	
	/**
	 * 	改变经理与用户关系
	 * @param INT $product_id		项目ID
	 * @param INT $users_id		用户ID
	 */
	public function change_relevance($director_id,$user_id) {
		
		$this->director_id = $director_id;
		$this->user_id = $user_id;
		$id = $this->where(array('director_id'=>$director_id,'user_id'=>$user_id))->getField('id');
		if ($id) {
			return $this->where(array('id'=>$id))->delete();
		} else {
			return $this->add();	
		}
	}
	
	
	

	
	

}

?>
