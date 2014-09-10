<?php
/**
 * 理财产品模块
 * @author Administrator
 *
 */
class ApiProductAction extends ApiBaseAction {
    
	//需要验证的模块
	protected $aVerify = array(
		'get_user_products'
	);
	

	//产品列表
	public function product_list() {
		
		$Product = D('Product');	
		$product_list = $Product->api_seek_all_data();
		if (empty($product_list)) {
			parent::callback(C('STATUS_NOT_DATA'),'没有数据');
		} else {
			parent::callback(C('STATUS_SUCCESS'),'获取成功',$product_list);
		}

    }

    public function product_one () {
    	
    	if ($this->isPost()) {
    		$Product = D('Product');
    		$id = $this->_post('id');
    		$product_info = $Product->seek_one_data($id);
    		if (empty($product_info)) {
    			parent::callback(C('STATUS_NOT_DATA'),'没有数据');
    		} else {
    			parent::callback(C('STATUS_SUCCESS'),'获取成功',$product_info);
    		}
    	}
    	
    }
    
    
    /**
     * 获取用户下理财产品列表
     */
    public function get_user_products () {
    	
    	$Product = D('Product');
    	$users_id = $this->oUser->id;
    	$list = $Product->seek_user_product($users_id);
    	$list ? parent::callback(C('STATUS_SUCCESS'),'获取成功！',$list) : parent::callback(C('STATUS_NOT_DATA'),'没有数据');
//    	echo $users_id;
  //  	exit;
    	//
    }
    
    
    
}