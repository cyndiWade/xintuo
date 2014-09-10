<?php
/**
 * 提问模块
 * @author Administrator
 *
 */
class ApiQuestionAction extends ApiBaseAction {
    
	//需要验证的模块
	protected $aVerify = array(
		'get_list','add_question'
	);
	

	/**
	 * 我提问的问题
	 */
	public function get_list() {
		
		$Question = D('Question');
		$user_id = $this->oUser->id;

		$list = $Question->seek_question_data($user_id);
		
		if (empty($list)) {
			parent::callback(C('STATUS_NOT_DATA'),'没有数据');
		} else {
			parent::callback(C('STATUS_SUCCESS'),'获取成功',$list);
		}
		
    }
    
   
    //提交问题
  	public function add_question() {
  		
  		if ($this->isPost()) {
  			import("@.Tool.Validate");							//验证类
  			$content = $_POST['content'];					//提问内容
			//数据验证
			if (Validate::checkNull($content)) parent::callback(C('STATUS_OTHER'),'提问内容不得为空');

  			$Question = D('Question');
  			$Question->content = $content;
  			$Question->user_id = $this->oUser->id;
  			$Question->time = time();
  			$Question->add () ? parent::callback(C('STATUS_SUCCESS'),'提交成功，我们会尽快回复您。') :  parent::callback(C('STATUS_UPDATE_DATA'),'提交失败，请重新尝试');
  		}
  		
  		//$this->display('Login:add_question');
  	}
    
}