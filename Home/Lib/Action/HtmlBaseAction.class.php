<?php

/**
 * Api基础类----通用的方法
 */
class HtmlBaseAction extends BaseAction {
	
	/**
	 * 保存用户信息，供子类调用
	 */
	protected $oUser;					//用户数据
	
	/**
	 * 子类继承后，重写此方法，用来验证需要用户身份的数据
	 * 如：
		protected $aVerify = array(
			'login',	//标示login控制器需要验证用户身份，否则拒绝访问
		);
	 */
	protected $aVerify = array();	//需要验证的方法
	
	
	
	/**
	 * 构造方法
	 */
	public function __construct() {
		parent:: __construct();			//重写父类构造方法
		
		//初始化
		$this->_init();
	}
	
	
	//初始化用户数据
	private function _init() {
		
// 		$demo = array(
// 			'id'=>'2',
// 			'account'=>'user1',
// 			'type'=>'1',
// 		) ;
// 		 $this->oUser = (object) $demo;
		$this->oUser = $_SESSION['user_info'];			//保存用户信息
		
		//验证需要登录的模块
		if (in_array(ACTION_NAME,$this->aVerify)) {
			
			if (empty($this->oUser)) {
				$this->error('登陆超时，请先登陆','?s=/Login/index');
			} 
		} 
	}
	

	/**
	 * 上传文件
	 * @param Array    $file  $_FILES['pic']	  上传的数组
	 * @param String   $type   上传文件类型    pic为图片
	 * @return Array	  上传成功返回文件保存信息，失败返回错误信息
	 */
	protected function upload_file($file,$dir,$size= 3145728,$type=array('jpg', 'gif', 'png', 'jpeg')) {
		import('@.ORG.Util.UploadFile');				//引入上传类
	
		$upload = new UploadFile();
		$upload->maxSize  =  $size;					// 设置附件上传大小
		$upload->allowExts  = $type;				// 上传文件的(后缀)（留空为不限制），，
		//上传保存
		$upload->savePath =  $dir;					// 设置附件上传目录
		$upload->autoSub = true;					// 是否使用子目录保存上传文件
		$upload->subType = 'date';					// 子目录创建方式，默认为hash，可以设置为hash或者date日期格式的文件夹名
		$upload->saveRule =  'uniqid';				// 上传文件的保存规则，必须是一个无需任何参数的函数名

		//执行上传
		$execute = $upload->uploadOne($file);
		//执行上传操作
		if(!$execute) {						// 上传错误提示错误信息
			return array('status'=>false,'info'=>$upload->getErrorMsg());
		}else{	//上传成功 获取上传文件信息
			return array('status'=>true,'info'=>$execute);
		}
	}
	
	
	
	
	
	/**
	 * 城市映射，通过城市名，获取城市id
	 * @param String $city_name		//市级城市名
	 */
	protected function get_city_id ($city_name) {
		$City = D('City');		//店铺模型表
		$all_city = $City->get_city_cache();			//读取城市缓存数据
		foreach ($all_city AS $val) {			//获取匹配后的城市id
			if (find_string($val['name'],$city_name)) {
				$city = $val['id'];
				break;
			}
		}
		return $city;
	}
	
	
	/**
	 * 短信验证模块
	 * @param String $telephone		//验证的手机号码
	 * @param Number $type				//验证类型：1为注册验证，2为商铺验证
	 */
	protected function check_verify ($telephone,$type) {
		$Verify = D('Verify');							//短信表
		$verify_code = $_POST['verify'];		//短信验证码
		
		$shp_info = $Verify->seek_verify_data($telephone,$type);

		//手机验证码验证
		if (empty($shp_info)) {
			self::callback(C('STATUS_NOT_DATA'),'验证码不存在');
		} elseif ($verify_code != $shp_info['verify']) {
			self::callback(C('STATUS_OTHER'),'验证码错误');
		} elseif ($shp_info['expired'] - time() < 0 ) {
			self::callback(C('STATUS_OTHER'),'验证码已过期');
		}
		//把验证码状态变成已使用
		$Verify->save_verify_status($shp_info['id']);
	}
	
	
	
	
}


?>