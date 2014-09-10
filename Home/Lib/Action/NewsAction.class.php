<?php
/**
 * 新闻模块
 *
 */
class NewsAction extends HtmlBaseAction {
    
	//需要身份验证的模块
	protected $aVerify = array(
		'index',
		'edit',
	);

	
	//理财产品列表
	public function index () {
		$News = D('News');			//理财产品
		$news_list = $News->seek_all_data();

		$this->assign('news_list',$news_list);
		$this->display();
		
	}
	
	
	//回复用户消息
	public function edit () {
		$News = D('News');			//理财产品
		$act = $this->_get('act');			//动作
		$id = $this->_get('id');				//Id
		
		
		if ($act == 'add') {
			if ($this->isPost()) {
				$this->check_data();
				$News->create();
				$News->create_time = time();
				$News->add() ? $this->success('添加成功！','?s=/News/index/') : $this->error('添加失败！');	
				exit;
			}
		} else if ($act == 'edit') {
			if ($this->isPost()) {
				$this->check_data();
				$News->create();
				$News->where(array('id'=>$id))->save() ? $this->success('修改成功！') : $this->error('没有做出修改！');
				exit;
			} else {
				$news_info = $News->seek_one_data($id);
				if (empty($news_info)) $this->error('此产品不存在');
			}
		} else if ($act == 'delete') {
			$News->del(array('id'=>$id)) ? $this->success('删除成功！') : $this->error('删除失败！');
			exit;
		}else {
			$this->error('非法操作！');
		}
		$this->assign('news_info',$news_info);
		$this->display();
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