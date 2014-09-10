<?php

/**
 * 产品与用户关系表
 */
class ProductUserModel extends BaseModel {
	
	/**
	 * 	改变产品与用户关系
	 * @param INT $product_id		项目ID
	 * @param INT $users_id		用户ID
	 */
	public function change_relevance($product_id,$users_id) {
		
		$this->product_id = $product_id;
		$this->users_id = $users_id;
		$id = $this->where(array('product_id'=>$product_id,'users_id'=>$users_id))->getField('id');
		if ($id) {
			return $this->where(array('id'=>$id))->delete();
		} else {
			return $this->add();	
		}
	}
	
	public function seek_user_product($product_id) {
		return $this->field('users_id')->where(array('product_id'=>$product_id))->select();
	}
	


}

?>
