<?php 


class BaseModel extends Model {
	

	protected $prefix;		//表前缀
	
	public function __construct() {
		parent::__construct();
	
		$this->admin_base_init();
	}
	
	
	private function admin_base_init () {
		$this->prefix = C('DB_PREFIX');
	}
	
	
	//删除方法
	public  function del($condition) {
		return $this->where($condition)->data(array('status'=>-2))->save();
	}

	
	/**
	 * 格式化日期
	 * @param unknown_type $all
	 */
	protected function setTime(&$all) {
		foreach ($all AS $key=>$val) {
			$all[$key]['time'] = date('Y-m-d H:i:s',$val['time']);
		}
	}
	
	/**
	 * 格式化日期
	 * @param Array $all			//数组
	 * @param Array $fields	//字段如：array('create_time','update_time');
	
	protected function set_all_time(&$all,$fields) {

		if (count($all[0]) >=1)  {
			foreach ($all AS $key=>$val) {
				for ($i=0;$i<count($fields);$i++) {
					$all[$key][$fields[$i]] = date('Y-m-d H:i:s',$all[$key][$fields[$i]]);
				}
			}

		} else {
			for ($i=0;$i<count($fields);$i++) {
				$all[$fields[$i]] = date('Y-m-d H:i:s',$all[$fields[$i]]);
			}
		}
		*/
		
		/**
		 * 格式化日期
		 * @param Array $all			//数组
		 * @param Array $fields			//字段如：array('create_time','update_time');
		 */
		protected function set_all_time(&$all,$fields,$default = 'Y-m-d H:i:s') {
			if (empty($all)) return false;
			/* 多维数组 */
			if (count($all[0]) >=1)  {
				foreach ($all AS $key=>$val) {
					for ($i=0;$i<count($fields);$i++) {
						if (empty($all[$key][$fields[$i]])) continue;
						$all[$key][$fields[$i]] = date($default,$all[$key][$fields[$i]]);
					}
				}
				/* 一维数组 */
			} else {
				for ($i=0;$i<count($fields);$i++) {
					if (empty($all[$fields[$i]])) continue;
					$all[$fields[$i]] = date($default,$all[$fields[$i]]);
				}
			}
		
		}
	

	

	
	

	
}
?>