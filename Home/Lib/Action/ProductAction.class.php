<?php
/**
 * 理财产品管理
 *
 */
class ProductAction extends HtmlBaseAction {
    
	//需要身份验证的模块
	protected $aVerify = array(
		'index',
		'edit',
		'relevance_product_user'
	);

	
	//理财产品列表
	public function index () {
		$Product = D('Product');			//理财产品
		$prodect_list = $Product->seek_all_data();
		
		$this->assign('prodect_list',$prodect_list);
		$this->display();
		
	}
	
	
	//回复用户消息
	public function edit () {
		$Product = D('Product');			//理财产品
		$act = $this->_get('act');			//动作
		$id = $this->_get('id');				//Id
		
		
		if ($act == 'add') {
			if ($this->isPost()) {
				$this->check_data();
				$Product->create();
				$Product->create_time = time();
				$Product->add() ? $this->success('添加成功！','?s=/Product/index/') : $this->error('添加失败！');	
				exit;
			}
			$product_info['content'] = "发行机构：\r\n产品期限：\r\n募集规模：\r\n起始资金：\r\n产品收益：\r\n产品说明：";
		} else if ($act == 'edit') {
		//	dump($_POST['content']);
			//exit;
			if ($this->isPost()) {
				$this->check_data();
				$Product->create();
				$Product->where(array('id'=>$id))->save() ? $this->success('修改成功！') : $this->error('没有做出修改！');
				exit;
			} else {
				$product_info = $Product->seek_one_data($id);
				if (empty($product_info)) $this->error('此产品不存在');
			}
		} else if ($act == 'delete') {
			$Product->del(array('id'=>$id)) ? $this->success('删除成功！') : $this->error('删除失败！');
			exit;
		}else {
			$this->error('非法操作！');
		}
		$this->assign('product_info',$product_info);
		$this->display();
	}
	
	
	/**
	 * 分配已购买用户
	 */
	public function relevance_product_user () {
		$id = $this->_get('id');			//产品ID
	
		$Product = D('Product');			//理财产品
		$Users = D('Users');
		$ProductUser = D('ProductUser');
		
		/* 理财产品信息 */
		$product_info = $Product->seek_one_data($id);
		if (empty($product_info)) $this->error('此产品不存在！');
		
		//查找指定的用户数据
		$map['u.type']  = 1;//筛选条件
		$map['u.status'] = 0;
		$list = $Users->seek_user_data($map);
	
		if ($list) {
			$relevance = $ProductUser->seek_user_product($id);
			$relevance_tmp = getArrayByField($relevance,'users_id');
	
			foreach ($list AS $key=>$val) {
				if (in_array($val['id'],$relevance_tmp)) {
					$list[$key]['checked'] = 'checked="checked"';
				}
			}
		}
		
		$this->assign('product_id',$id);
		$this->assign('header',$product_info['name']);
		$this->assign('list',$list);
		$this->display();
		
	}
	
	
	/**
	 * AJAX设置用户与产品关系
	 */
	public function AJAX_Set_Product_User () {
		
		if ($this->isPost()) {
			$ProductUser = D('ProductUser');				
			$product_id = $this->_post('product_id');
			$users_id = $this->_post('users_id');
			$status = $ProductUser->change_relevance($product_id,$users_id);
			$status ? parent::callback(C('STATUS_SUCCESS'),'成功！') : parent::callback(C('STATUS_UPDATE_DATA'),'数据修改失败！');
		} else {
			parent::callback(C('STATUS_OTHER'),'非法访问！');
		}
	}
	
	
	//数据验证
	private function check_data () {
		import("@.Tool.Validate");							//验证类
		//数据验证
		if (Validate::checkNull($_POST['name']) || Validate::checkNull($_POST['content'])) {
			$this->error('请输入对应内容');
		}
	
	}
	
	

	
	
}