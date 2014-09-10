<?php

/**
 *	
 */
class BrowseLogModel extends BaseModel {
	
	
	/**
	 * 记录日志
	 * @param INT $product_id		//产品ID
	 * @param INT $users_id			//用户ID
	 */
	public function add_one_log ($product_id,$users_id) {
		$this->product_id = $product_id;
		$this->users_id = $users_id;
		$this->time = time();
		return $this->add();
	}
	
	
	/**
	 * 获取当前用户下用户浏览产品的日志
	 * @param String $account		用户账号
	 */
	public function seek_user_record ($account) {
		$data = $this->field('p.name,bl.time')
		->table($this->prefix.'browse_log AS bl')
		->join($this->prefix.'product AS p ON bl.product_id = p.id')
		->join($this->prefix.'users AS u ON bl.users_id = u.id')
		->where(array('u.account'=>$account))
		->order('bl.id DESC')
		->select();	
		parent::set_all_time($data,array('time'));
		return $data;	
	}
	
	
	

	
	
}

?>
