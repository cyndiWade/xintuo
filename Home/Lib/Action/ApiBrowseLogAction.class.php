<?php
/**
 * 日志模块
 */
class ApiBrowseLogAction extends ApiBaseAction {
    
	//需要验证的模块
	protected $aVerify = array(
		'record_log'
	);
	

	//记录日志
	public function record_log () {
		if ($this->isPost()) {
			$BrowseLog = D('BrowseLog');
			//	$product_id	= $this->_get('product_id');
			$product_id =  $this->_post('product_id');
			$users_id	= $this->oUser->id;
			$status = $BrowseLog->add_one_log($product_id,$users_id);
			if ($status) {
				parent::callback(C('STATUS_SUCCESS'),'记录成功');
			} else {
				parent::callback(C('STATUS_OTHER'),'记录失败');
			}
		} 
		
	}
	
	/**
	 * 通过用户账号，获取浏览日志
	 */
	public function record_list() {
		
		if ($this->isPost()) {
			$BrowseLog = D('BrowseLog');
			$account = $this->_post('account');
			$browse_log_list = $BrowseLog->seek_user_record($account);
			
			if (empty($browse_log_list)) {
				parent::callback(C('STATUS_NOT_DATA'),'没有数据');
			} else {
				parent::callback(C('STATUS_SUCCESS'),'获取成功',$browse_log_list);
			}
		}
		

		
		

    }

    
}