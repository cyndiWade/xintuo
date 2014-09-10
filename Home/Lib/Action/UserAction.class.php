<?php
/**
 * 用户控制器
 * @author Administrator
 *
 */
class UserAction extends HtmlBaseAction {
    
	//需要身份验证的模块
	protected $aVerify = array(
		'user_list',
		'user_add',
		'user_edit',
		'user_del',
	);

	
	//所有用户列表
	public function user_list () {
		$Users = D('Users');
		
		$type = $this->_get('type');		//用户类型
		switch ($type) {
			case '1' :
				$header = '用户列表';
				break;
			case '2' :
				$header = '客户经理列表';
				break;
			case '' :
				$header = '所有用户列表';
				break;	
			default :
				$this->error('非法操作！');	
		}
		$this->assign('header',$header);
		
		/**
		 * 用户搜索
		 * u.account
		 * u.type
		 * u.name
		 * i.identity
		 * i.sex
		 */
		$user_field = array('account','type','name');
		$user_info_field = array('identity','sex');
		$search = array();
		foreach ($_POST AS $key=>$val) {
			if ($val != '') {
				if (in_array($key,$user_field)) {
					$map['u.'.$key] = $val;
				} elseif (in_array($key,$user_info_field)) {
					$map['i.'.$key] = $val;
				}
			}
		}

		//筛选条件
		if (!empty($type)) $map['u.type']  = array('eq',$type);
		$map['u.status'] = 0;
		
		//查找指定的用户数据
		$list = $Users->seek_user_data($map);
	
		parent::public_file_dir($list,'file_address','images/');

		$this->assign('list',$list);	
		$this->display();
	}
	
	
	//添加用户
	public function user_add () {
		$type = $this->_get('type');
		switch ($type) {
			case 'user' :
				$header = '添加普通用户';
				$user_type = C('ACCOUNT_TYPE.USER');
				break;
			case 'director' :
				$header = '添加客户经理';
				$user_type = C('ACCOUNT_TYPE.Director');
				break;
			default:
				$this->error('非法操作');
		}
		$this->assign('header',$header);
		$this->assign('type',$type);
		
		if ($this->isPost()) {
			
			$this->check_data();
			$account = $_POST['account'];
			$password = $_POST['password_one'];
			if (!Validate::checkPhone($account)) $this->error('账号必须是11位的手机号码');
			if (Validate::checkNull($password)) $this->error('密码不得为空');
			
			//数据库验证
			$Users = D('Users');							//用户表模型
			$UserInfo = D('UserInfo');			//用户信息表
			
			//账号验证、数据写入模块
			$is_have = $Users->account_is_have($account);		//查看账号是否存在
			if ($is_have) {
				$this->error('此账号已注册');
			} else {		//添加注册用户
				$Users->create();
				$Users->password = $this->_post('password_one');
				$id = $Users->add_account($user_type) ;		//添加指定类型的用户
				
				if ($id) {
					$UserInfo->create();
					$UserInfo->user_id = $id;
					$UserInfo->add() ? $this->success('恭喜你，添加成功','?s=/User/user_list') : $this->success('用户已添加，请编辑详细信息','?s=/User/user_edit/id/'.$status1);
				} else {
					$this->error('添加失败，请重新尝试');
				}		
			}
			exit;
		}
		
		$this->display();
	}
	
	
	//编辑用户信息
	public function user_edit () {
		//数据验证
		$id = $this->_get('id');
		if (empty($id) || (!is_numeric($id))) {
			$this->error('非法操作！');
		}  
		
		$Users = D('Users');					//用户表
		$UserInfo = D('UserInfo');			//用户信息表
		
		if ($this->isPost()) {
			$this->check_data();		//数据验证
			
			$password = $_POST['password_one'];
			if (!empty($password)) {
				$status1 = $Users->where(array('id'=>$id))->setField(array('password'=>md5($password)));	//修改密码
			}
			
			//写入详细信息
			$status2 = $UserInfo->save_user_data($id);

			if ($status1 || $status2) {
				$this->success('更新成功');
			} else {
				$this->error('没有做出修改');
			}
			exit;
		} else {
			
			//读取数据
			$user_info = $Users->seek_user_data(array('u.status'=>0,'u.id'=>$id));

			if (empty($user_info)) $this->error('此用户不存在或已被删除');
				
			parent::public_file_dir($user_info,'file_address','images/');		//组合图片地址
				
			$this->assign('user_info',$user_info[0]);
			$this->display();
		}

		
	}
	
	
	public function user_del () {
		$Users = D('Users');
		$id = $this->_get('id');
		
		$type = $Users->where(array('id'=>$id))->getField('type');
		if ($type == 0) $this->error('管理员无法删除');
		
		$Users->del(array('id'=>$id)) ? $this->success('删除成功！') : $this->error('删除失败！');
	}
	
	
	//数据验证
	private function check_data () {
		import("@.Tool.Validate");							//验证类
		//数据验证
		if (!Validate::checkNull($_POST['password_one']) || !Validate::checkNull($_POST['password_two'])) {
			if (!Validate::checkEquals($_POST['password_one'],$_POST['password_two'])) {
				$this->error('二次输入的密码不同');
			}
		}
		if (!empty($_POST['email'])) {
			if (!Validate::checkemail($_POST['email'])) $this->error ('电子邮箱格式错误');
		}
		
		if (!empty($_POST['identity'])) {
			//342401199201208174
			if (!Validate::check_identity($_POST['identity']))  $this->error ('证件格式错误');
		}
		

	}
	
    
}