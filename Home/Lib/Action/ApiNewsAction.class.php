<?php
/**
 * 新闻模块
 * @author Administrator
 *
 */
class ApiNewsAction extends ApiBaseAction {
    
	//需要验证的模块
	protected $aVerify = array(
		
	);
	

	//产品列表
	public function news_list() {
		
		$News = D('News');	
		$news_list = $News->seek_all_data();
		if (empty($news_list)) {
			parent::callback(C('STATUS_NOT_DATA'),'没有数据');
		} else {
			parent::callback(C('STATUS_SUCCESS'),'获取成功',$news_list);
		}

    }

    public function news_one () {
    	
    	if ($this->isPost()) {
    		$News = D('News');
    		$id = $this->_post('id');
    		$news_info = $News->seek_one_data($id);
    		if (empty($news_info)) {
    			parent::callback(C('STATUS_NOT_DATA'),'没有数据');
    		} else {
    			parent::callback(C('STATUS_SUCCESS'),'获取成功',$news_info);
    		}
    	}
    	
    }

    
}