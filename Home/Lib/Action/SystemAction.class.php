<?php
/**
 * 系统首页控制器
 * @author Administrator
 *
 */
class SystemAction extends HtmlBaseAction {
    
	
	//需要验证的模块
	protected $aVerify = array(
		'index',
	);
	
	//
	public function index () {
		$num = M('Users')->where(array('status'=>0))->count();
		$question_num = M('Question')->where(array('status'=>0,'is_reply'=>1))->count();
		
		$this->assign('question_num',$question_num);
		$this->assign('num',$num);
		$this->display();
	}

	
	
    
}