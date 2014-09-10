<?php

/**
 * 新闻模型表
 */
class NewsModel extends BaseModel {
	

	/**
	 * 获取所有数据
	 */
	public function seek_all_data () {
		$data = $this->field('id,name,create_time')->where(array('status'=>0))->select();
		parent::set_all_time($data, array('create_time'));
		return $data;
	} 

	public function seek_one_data ($id) {
		$data = $this->field('id,name,content,create_time')->where(array('status'=>0,'id'=>$id))->find();
		$data ? parent::set_all_time($data, array('create_time')) : $data;
		return $data;
	}

	
	
	
}

?>
