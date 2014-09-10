<?php
/**
 * 推送系统消息
 * @author Administrator
 *
 */
class SendAction extends HtmlBaseAction {
    
	//需要身份验证的模块
	protected $aVerify = array(
		'index',
	);

	
	//所有用户列表
	public function index () {

		if ($this->isPost()) {
			import("@.Tool.Validate");							//验证类
			$content = $_POST['content'];
			if (Validate::checkNull($content)) $this->error('推送内容不得为空');
			$this->send_broadcast($content);
		}
		$this->display();
	}


	private function  send_broadcast($content) {
		import("@.Vendor.XMPPHP.XMPP",'','.php');
		
		$server = C('OPEN_FIRE.host');

		$conn = new XMPPHP_XMPP($server, 5222, 'system', '123456', 'xmpphp',$server, $printlog=false, $loglevel=XMPPHP_Log::LEVEL_INFO);
		try {
			//建立连接
			$conn->connect();
			$conn->processUntil('session_start');
			$conn->presence();
			//发送消息
			$conn->message('all@broadcast.'.$server, $content);		//目标接收人JID(此为广播)
			//断开连接
			$conn->disconnect();
		} catch(XMPPHP_Exception $e) {
			die($e->getMessage());
		}
	}
	
	
	public function demo () {
		import("@.Vendor.XMPPHP.XMPP",'','.php');
	
		$conn = new XMPPHP_XMPP('xintuo.rikee.net', 5222, 'admin', '123456', 'xmpphp', 'xintuo.rikee.net', $printlog=false, $loglevel=XMPPHP_Log::LEVEL_INFO);
		try {
			//建立连接
			$conn->connect();
			$conn->processUntil('session_start');
			$conn->presence();
			//发送消息
			$conn->message('13761951739@xintuo.rikee.net', $content);		//目标接收人JID(此为广播)
			//断开连接
			$conn->disconnect();
		} catch(XMPPHP_Exception $e) {
			die($e->getMessage());
		}
	}
	
	
	private function _send($message) {
	
		//手机注册应用返回唯一的deviceToken
		$deviceToken = '6ad7b13f b05e6137 a46a60ea 421e5016 4b701671 cc176f70 33bb9ef4 38a8aef9';
		//ck.pem通关密码
		$pass = 'jetson';
		//消息内容
		$message = $message;
		//badge我也不知是什么
		$badge = 4;
		//sound我也不知是什么（或许是推送消息到手机时的提示音）
		$sound = 'Duck.wav';
		//建设的通知有效载荷（即通知包含的一些信息）
		$body = array();
		$body['id'] = "4f94d38e7d9704f15c000055";
		$body['aps'] = array('alert' => $message);
		if ($badge)
			$body['aps']['badge'] = $badge;
		if ($sound)
			$body['aps']['sound'] = $sound;
		//把数组数据转换为json数据
		$payload = json_encode($body);
		echo strlen($payload),"\r\n";
		
		//下边的写法就是死写法了，一般不需要修改，
		//唯一要修改的就是：ssl://gateway.sandbox.push.apple.com:2195这个是沙盒测试地址，ssl://gateway.push.apple.com:2195正式发布地址
		$ctx = stream_context_create();
		stream_context_set_option($ctx, 'ssl', 'local_cert', 'ck.pem');		//证书文件地址
		stream_context_set_option($ctx, 'ssl', 'passphrase', $pass);
		$fp = stream_socket_client('ssl://gateway.sandbox.push.apple.com:2195', $err, $errstr, 60, STREAM_CLIENT_CONNECT, $ctx);
		if (!$fp) {
			print "Failed to connect $err $errstr\n";
			return;
		} else {
			print "Connection OK\n<br/>";
		}
		// 发送信息
		$msg = chr(0) . pack("n",32) . pack('H*', str_replace(' ', '', $deviceToken)) . pack("n",strlen($payload)) . $payload;
			print "Sending message :" . $payload . "\n";
		fwrite($fp, $msg);
		fclose($fp);

	}
	
    
}