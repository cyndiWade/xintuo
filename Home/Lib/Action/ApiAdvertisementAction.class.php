<?php
/**
 * 广告模块接口
 * @author Administrator
 *
 */
class ApiAdvertisementAction extends ApiBaseAction {
    
	//需要验证的模块
	protected $aVerify = array(
		
	);
	

	/**
	 * 广告列表
	 */
	public function index() {
		
		if ($this->isPost()) {
			$Advertisement = D('Advertisement');			//广告模型
			$data_list = $Advertisement->seek_all_data();
			
			if (empty($data_list)) {
				parent::callback(C('STATUS_NOT_DATA'),'没有数据');
			} else {
				parent::public_file_dir($data_list,array('file_address'),'images/');
				parent::callback(C('STATUS_SUCCESS'),'获取成功',$data_list);
			}
		}
 		

    }


}