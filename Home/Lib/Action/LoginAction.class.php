<?php
/**
 * 登陆控制器
 * @author Administrator
 *
 */
class LoginAction extends HtmlBaseAction {
    
	
	//需要验证的模块
	protected $aVerify = array(
		
	);
	
	

	//获取首页信息
	public function index(){

		if (!empty($this->oUser)) $this->redirect('/User/user_list');
		
		if ($this->isPost()) {
			$Users = D('Users');									//用户表模型
			import("@.Tool.Validate");							//验证类
			
			$account = $_POST['account'];					//用户账号
			$password = $_POST['password'];	//用户密码
			
			//数据过滤
			if (Validate::checkNull($account)) $this->error('账号不得为空');
			if (Validate::checkNull($password)) $this->error('密码不得为空');
			if (!Validate::check_string_num($account)) $this->error('账号密码只能输入英文或数字');

			//读取用户数据
			$user_info = $Users->get_user_info(array('account'=>$account,'type'=>0,'status'=>0));
			
			//验证用户数据
			if (empty($user_info)) {
				$this->error('此用户不存在！');
			} else {
				if (md5($password) != $user_info['password']) {
					$this->error('密码错误！');
				} else {
					$tme_arr = array(
						'id' =>$user_info['id'],
						'account' => $user_info['account'],
						'name' => $user_info['name'],
					);
					$_SESSION['user_info'] = (object) $tme_arr;		//保存用户信息
					//更新用户信息
					$Users->up_login_info($user_info['id']);
					$this->redirect('/System/index');
				}
			}
			
		}
		
		$this->display();
    }
    
    
    //退出登陆
    public function logout () {
    	if (session_start()) {
    		session_destroy();
    		$this->success('退出成功','?s=/Login/index');
    	}
    }
    
    
    public function get_ip () {
		echo get_client_ip();
	}
	
	
    
}