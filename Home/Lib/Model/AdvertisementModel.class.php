<?php

/**
 * 广告模型表
 */
class AdvertisementModel extends BaseModel {
	

	public function add_one_data (){
		$this->time = time();
		return $this->add();
	}
	

	
	/**
	 * 获取广告数据
	 */
	public function seek_all_data () {
		$data = $this->field('a.id AS aid,p.id,f.file_address,p.name,a.time')
		->table($this->prefix.'advertisement AS a')
		->join($this->prefix.'product AS p ON a.product_id = p.id')
		->join($this->prefix.'file AS f ON a.file_id = f.id')
		->where(array('a.status'=>0))
		->select();
		parent::set_all_time($data, array('time'));
		return $data;
	} 

	
	
	
}

?>
