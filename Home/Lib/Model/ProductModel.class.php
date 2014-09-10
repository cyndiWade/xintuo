<?php

/**
 * 理财产品模型
 */
class ProductModel extends BaseModel {
	

	/**
	 * 获取所有数据
	 */
	public function seek_all_data () {
		$data = $this->field('id,name,content,create_time')->where(array('status'=>0))->select();
		parent::set_all_time($data, array('create_time'));
		return $data;
	} 

	public function seek_one_data ($id) {
		$data = $this->field('id,name,content,create_time')->where(array('status'=>0,'id'=>$id))->find();
		$data ? parent::set_all_time($data, array('create_time')) : $data;
		return $data;
	}

	
	/**
	 * 获取所有理财产品
	 */
	public function api_seek_all_data () {
		$data = $this->field('id,name,content,create_time')->where(array('status'=>0))->select();

		if (!empty($data)) {
			$reg = "'([\s])[\s]+'";	//匹配换号符号
			foreach ($data AS $key=>$val) {
				$data[$key]['content'] = preg_replace($reg, "|",$val['content']);
			}
		}

		parent::set_all_time($data, array('create_time'));
		return $data;
	}
	
	
	/**
	 * 获取用户下的理财产品
	 */
	public function seek_user_product($users_id) {
		$data = $this->field('p.id,p.name,p.content')
		->table($this->prefix.'product_user AS pu')
		->join($this->prefix.'product AS p ON p.id = pu.product_id')
		->where(array('pu.users_id'=>$users_id,'p.status'=>0))
		->select();
		if (!empty($data)) {
			$reg = "'([\s])[\s]+'";	//匹配换号符号
			foreach ($data AS $key=>$val) {
				$data[$key]['content'] = preg_replace($reg, "|",$val['content']);
			}
		}
		return $data;
	}
	
}

?>
