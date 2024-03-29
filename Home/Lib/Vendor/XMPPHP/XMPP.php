<?php
/**
 * 这个文件是SleekXMPP的一部分
 * 	主要操作类
 */

/** XMPPHP_XMLStream */
require_once dirname(__FILE__) . "/XMLStream.php";		
require_once dirname(__FILE__) . "/Roster.php";

/**
 * XMPPHP Main Class				//主要类
 * 
 * @category   xmpphp 
 * @package	XMPPHP
 * @author	 Nathanael C. Fritz <JID: fritzy@netflint.net>
 * @author	 Stephan Wentz <JID: stephan@jabber.wentz.it>
 * @author	 Michael Garvin <JID: gar@netflint.net>
 * @copyright  2008 Nathanael C. Fritz
 * @version	$Id$
 */
class XMPPHP_XMPP extends XMPPHP_XMLStream {
	/**
	 * @var string
	 */
	public $server;		//服务器

	/**
	 * @var string
	 */
	public $user;			//用户名
	
	/**
	 * @var string
	 */
	protected $password;		//密码
	
	/**
	 * @var string
	 */
	protected $resource;		//资源
	
	/**
	 * @var string
	 */
	protected $fulljid;			//全JID
	
	/**
	 * @var string
	 */
	protected $basejid;	//基本JID--用户名@服务器店址
	
	/**
	 * @var boolean
	 */
	protected $authed = false;
	protected $session_started = false;
	
	/**
	 * @var boolean
	 */
	protected $auto_subscribe = false;
	
	/**
	 * @var boolean
	 */
	protected $use_encryption = true;
	
	/**
	 * @var boolean
	 */
	public $track_presence = true;
	
	/**
	 * @var object
	 */
	public $roster;

	/**
	 * Constructor
	 *
	 * @param string  $host
	 * @param integer $port
	 * @param string  $user
	 * @param string  $password
	 * @param string  $resource
	 * @param string  $server
	 * @param boolean $printlog
	 * @param string  $loglevel
	 */
	public function __construct($host, $port, $user, $password, $resource, $server = null, $printlog = false, $loglevel = null) {
		parent::__construct($host, $port, $printlog, $loglevel);
		
		$this->user	 = $user;
		$this->password = $password;
		$this->resource = $resource;
		if(!$server) $server = $host;
		$this->basejid = $this->user . '@' . $this->host;

		$this->roster = new Roster();
		$this->track_presence = true;

		$this->stream_start = '<stream:stream to="' . $server . '" xmlns:stream="http://etherx.jabber.org/streams" xmlns="jabber:client" version="1.0">';
		$this->stream_end   = '</stream:stream>';
		$this->default_ns   = 'jabber:client';
		
		$this->addXPathHandler('{http://etherx.jabber.org/streams}features', 'features_handler');
		$this->addXPathHandler('{urn:ietf:params:xml:ns:xmpp-sasl}success', 'sasl_success_handler');
		$this->addXPathHandler('{urn:ietf:params:xml:ns:xmpp-sasl}failure', 'sasl_failure_handler');
		$this->addXPathHandler('{urn:ietf:params:xml:ns:xmpp-tls}proceed', 'tls_proceed_handler');
		$this->addXPathHandler('{jabber:client}message', 'message_handler');
		$this->addXPathHandler('{jabber:client}presence', 'presence_handler');
		$this->addXPathHandler('iq/{jabber:iq:roster}query', 'roster_iq_handler');
	}

	/**
	 * Turn encryption on/ff		//加密对
	 *
	 * @param boolean $useEncryption
	 */
	public function useEncryption($useEncryption = true) {
		$this->use_encryption = $useEncryption;
	}
	
	/**
	 * Turn on auto-authorization of subscription requests.		//打开汽车授权的订阅请求。
	 *
	 * @param boolean $autoSubscribe
	 */
	public function autoSubscribe($autoSubscribe = true) {
		$this->auto_subscribe = $autoSubscribe;
	}

	/**
	 * Send XMPP Message			//发送消息
	 *
	 * @param string $to
	 * @param string $body
	 * @param string $type
	 * @param string $subject
	 */
	public function message($to, $body, $type = 'chat', $subject = null, $payload = null) {
	    if(is_null($type))
	    {
	        $type = 'chat';
	    }
	    
		$to	  = htmlspecialchars($to);
		$body	= htmlspecialchars($body);
		$subject = htmlspecialchars($subject);
		
		$out = "<message from=\"{$this->fulljid}\" to=\"$to\" type='$type'>";
		if($subject) $out .= "<subject>$subject</subject>";
		$out .= "<body>$body</body>";
		if($payload) $out .= $payload;
		$out .= "</message>";
		
		$this->send($out);
	}

	/**
	 * Set Presence		//设置存在---建立连接的一部分
	 *
	 * @param string $status
	 * @param string $show
	 * @param string $to
	 */
	public function presence($status = null, $show = 'available', $to = null, $type='available', $priority=0) {
		if($type == 'available') $type = '';
		$to	 = htmlspecialchars($to);
		$status = htmlspecialchars($status);
		if($show == 'unavailable') $type = 'unavailable';
		
		$out = "<presence";
		if($to) $out .= " to=\"$to\"";
		if($type) $out .= " type='$type'";
		if($show == 'available' and !$status) {
			$out .= "/>";
		} else {
			$out .= ">";
			if($show != 'available') $out .= "<show>$show</show>";
			if($status) $out .= "<status>$status</status>";
			if($priority) $out .= "<priority>$priority</priority>";
			$out .= "</presence>";
		}
		
		$this->send($out);
	}
	/**
	 * Send Auth request		//发送认证请求
	 *
	 * @param string $jid
	 */
	public function subscribe($jid) {
		$this->send("<presence type='subscribe' to='{$jid}' from='{$this->fulljid}' />");
		#$this->send("<presence type='subscribed' to='{$jid}' from='{$this->fulljid}' />");
	}

	/**
	 * Message handler		//消息处理程序
	 *	
	 * @param string $xml
	 */
	public function message_handler($xml) {
		if(isset($xml->attrs['type'])) {
			$payload['type'] = $xml->attrs['type'];
		} else {
			$payload['type'] = 'chat';
		}
		$payload['from'] = $xml->attrs['from'];
		$payload['body'] = $xml->sub('body')->data;
		$payload['xml'] = $xml;
		$this->log->log("Message: {$xml->sub('body')->data}", XMPPHP_Log::LEVEL_DEBUG);
		$this->event('message', $payload);
	}

	/**
	 * Presence handler			//存在处理程序
	 *
	 * @param string $xml
	 */
	public function presence_handler($xml) {
		$payload['type'] = (isset($xml->attrs['type'])) ? $xml->attrs['type'] : 'available';
		$payload['show'] = (isset($xml->sub('show')->data)) ? $xml->sub('show')->data : $payload['type'];
		$payload['from'] = $xml->attrs['from'];
		$payload['status'] = (isset($xml->sub('status')->data)) ? $xml->sub('status')->data : '';
		$payload['priority'] = (isset($xml->sub('priority')->data)) ? intval($xml->sub('priority')->data) : 0;
		$payload['xml'] = $xml;
		if($this->track_presence) {
			$this->roster->setPresence($payload['from'], $payload['priority'], $payload['show'], $payload['status']);
		}
		$this->log->log("Presence: {$payload['from']} [{$payload['show']}] {$payload['status']}",  XMPPHP_Log::LEVEL_DEBUG);
		if(array_key_exists('type', $xml->attrs) and $xml->attrs['type'] == 'subscribe') {
			if($this->auto_subscribe) {
				$this->send("<presence type='subscribed' to='{$xml->attrs['from']}' from='{$this->fulljid}' />");
				$this->send("<presence type='subscribe' to='{$xml->attrs['from']}' from='{$this->fulljid}' />");
			}
			$this->event('subscription_requested', $payload);
		} elseif(array_key_exists('type', $xml->attrs) and $xml->attrs['type'] == 'subscribed') {
			$this->event('subscription_accepted', $payload);
		} else {
			$this->event('presence', $payload);
		}
	}

	/**
	 * Features handler				//特性处理程序
	 *
	 * @param string $xml
	 */
	protected function features_handler($xml) {
		if($xml->hasSub('starttls') and $this->use_encryption) {
			$this->send("<starttls xmlns='urn:ietf:params:xml:ns:xmpp-tls'><required /></starttls>");
		} elseif($xml->hasSub('bind') and $this->authed) {
			$id = $this->getId();
			$this->addIdHandler($id, 'resource_bind_handler');
			$this->send("<iq xmlns=\"jabber:client\" type=\"set\" id=\"$id\"><bind xmlns=\"urn:ietf:params:xml:ns:xmpp-bind\"><resource>{$this->resource}</resource></bind></iq>");
		} else {
			$this->log->log("Attempting Auth...");
			if ($this->password) {
			$this->send("<auth xmlns='urn:ietf:params:xml:ns:xmpp-sasl' mechanism='PLAIN'>" . base64_encode("\x00" . $this->user . "\x00" . $this->password) . "</auth>");
			} else {
                        $this->send("<auth xmlns='urn:ietf:params:xml:ns:xmpp-sasl' mechanism='ANONYMOUS'/>");
			}	
		}
	}

	/**
	 * SASL success handler		//SASL成功处理程序
	 *
	 * @param string $xml
	 */
	protected function sasl_success_handler($xml) {
		$this->log->log("Auth success!");
		$this->authed = true;
		$this->reset();
	}
	
	/**
	 * SASL feature handler		//SASL特性处理程序
	 *
	 * @param string $xml
	 */
	protected function sasl_failure_handler($xml) {
		$this->log->log("Auth failed!",  XMPPHP_Log::LEVEL_ERROR);
		$this->disconnect();
		
		throw new XMPPHP_Exception('Auth failed!');
	}

	/**
	 * Resource bind handler		//资源绑定处理程序
	 *
	 * @param string $xml
	 */
	protected function resource_bind_handler($xml) {
		if($xml->attrs['type'] == 'result') {
			$this->log->log("Bound to " . $xml->sub('bind')->sub('jid')->data);
			$this->fulljid = $xml->sub('bind')->sub('jid')->data;
			$jidarray = explode('/',$this->fulljid);
			$this->jid = $jidarray[0];
		}
		$id = $this->getId();
		$this->addIdHandler($id, 'session_start_handler');
		$this->send("<iq xmlns='jabber:client' type='set' id='$id'><session xmlns='urn:ietf:params:xml:ns:xmpp-session' /></iq>");
	}

	/**
	* Retrieves the roster				//检索
	*
	*/
	public function getRoster() {
		$id = $this->getID();
		$this->send("<iq xmlns='jabber:client' type='get' id='$id'><query xmlns='jabber:iq:roster' /></iq>");
	}

	/**
	* Roster iq handler			//花名册iq处理程序
	* Gets all packets matching XPath "iq/{jabber:iq:roster}query'
	*
	* @param string $xml
	*/
	protected function roster_iq_handler($xml) {
		$status = "result";
		$xmlroster = $xml->sub('query');
		foreach($xmlroster->subs as $item) {
			$groups = array();
			if ($item->name == 'item') {
				$jid = $item->attrs['jid']; //REQUIRED
				$name = $item->attrs['name']; //MAY
				$subscription = $item->attrs['subscription'];
				foreach($item->subs as $subitem) {
					if ($subitem->name == 'group') {
						$groups[] = $subitem->data;
					}
				}
				$contacts[] = array($jid, $subscription, $name, $groups); //Store for action if no errors happen
			} else {
				$status = "error";
			}
		}
		if ($status == "result") { //No errors, add contacts
			foreach($contacts as $contact) {
				$this->roster->addContact($contact[0], $contact[1], $contact[2], $contact[3]);
			}
		}
		if ($xml->attrs['type'] == 'set') {
			$this->send("<iq type=\"reply\" id=\"{$xml->attrs['id']}\" to=\"{$xml->attrs['from']}\" />");
		}
	}

	/**
	 * Session start handler			//会话开始处理程序
	 *
	 * @param string $xml
	 */
	protected function session_start_handler($xml) {
		$this->log->log("Session started");
		$this->session_started = true;
		$this->event('session_start');
	}

	/**
	 * TLS proceed handler		//TLS继续处理程序
	 *
	 * @param string $xml
	 */
	protected function tls_proceed_handler($xml) {
		$this->log->log("Starting TLS encryption");
		stream_socket_enable_crypto($this->socket, true, STREAM_CRYPTO_METHOD_SSLv23_CLIENT);
		$this->reset();
	}

	/**
	* Retrieves the vcard		//检索电子名片

	*
	*/
	public function getVCard($jid = Null) {
		$id = $this->getID();
		$this->addIdHandler($id, 'vcard_get_handler');
		if($jid) {
			$this->send("<iq type='get' id='$id' to='$jid'><vCard xmlns='vcard-temp' /></iq>");
		} else {
			$this->send("<iq type='get' id='$id'><vCard xmlns='vcard-temp' /></iq>");
		}
	}

	/**
	* VCard retrieval handler			//名片检索处理程序
	*
	* @param XML Object $xml
	*/
	protected function vcard_get_handler($xml) {
		$vcard_array = array();
		$vcard = $xml->sub('vcard');
		// go through all of the sub elements and add them to the vcard array
		foreach ($vcard->subs as $sub) {
			if ($sub->subs) {
				$vcard_array[$sub->name] = array();
				foreach ($sub->subs as $sub_child) {
					$vcard_array[$sub->name][$sub_child->name] = $sub_child->data;
				}
			} else {
				$vcard_array[$sub->name] = $sub->data;
			}
		}
		$vcard_array['from'] = $xml->attrs['from'];
		$this->event('vcard', $vcard_array);
	}
}
