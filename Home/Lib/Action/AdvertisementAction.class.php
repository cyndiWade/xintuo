<?php
/**
 * 广告模块
 *
 */
class AdvertisementAction extends HtmlBaseAction {
    
	//需要身份验证的模块
	protected $aVerify = array(
		'index',
		'edit',
	);

	//广告模块列表
	public function index () {
		$Advertisement = D('Advertisement');			//广告模型
		$html_list = $Advertisement->seek_all_data();

		if ($html_list) {
			parent::public_file_dir($html_list,array('file_address'),'images/');
		}
		
		$this->assign('html_list',$html_list);
		$this->display();
		
	}
	
	
	//广告模块编辑
	public function edit () {
		$Advertisement = D('Advertisement');			//广告模型
		$Product = D('Product');								//理财产品
		$File = D('File');											//文件表
		
		$act = $this->_get('act');			//动作
		$id = $this->_get('id');				//Id
		

		if ($act == 'add') {
			
			if ($this->isPost()) {
				
				$this->check_data();
				
				/* 上传文件 */
				$upload_dir = C('UPLOAD_DIR');
				$upload_result = parent::upload_file($_FILES['img_file'],$upload_dir['web_dir'].$upload_dir['image']);
				if ($upload_result['status'] == false) {
					$this->error($upload_result['info']);
				} else {
					/* 保存上传文件 */
					$file_id = $File->data(array('file_address'=>$upload_result['info'][0]['savename'],'type'=>3))->add();
					
					/* 保存广告信息 */
					if ($file_id) {
						$Advertisement->create();
						$Advertisement->file_id = $file_id;
						$Advertisement->add_one_data() ? $this->success('添加成功！','?s=/Advertisement/index') : $this->error('添加失败！');
					} else {
						$this->error('上传文件保存错误，请重新上传');
					}
					
				}
				exit;
			}
			
		} else if ($act == 'edit') {
			if ($this->isPost()) {
				$this->check_data();
				$News->create();
				$News->where(array('id'=>$id))->save() ? $this->success('修改成功！') : $this->error('没有做出修改！');
				exit;
			} 
			
		//	$news_info = $News->seek_one_data($id);
		//	if (empty($news_info)) $this->error('此产品不存在');
		//	$prodect_list = $Product->seek_all_data();	//理财产品列表
		
		} else if ($act == 'delete') {
			$Advertisement->del(array('id'=>$id)) ? $this->success('删除成功！') : $this->error('删除失败！');
			exit;
		}else {
			$this->error('非法操作！');
		}
		
		$prodect_list = $Product->seek_all_data();	//理财产品列表
		$this->assign('prodect_list',$prodect_list);
		$this->assign('news_info',$news_info);
		$this->display();
	}
	
	
	//数据验证
	private function check_data () {
		import("@.Tool.Validate");							//验证类
		//数据验证

		if (Validate::checkNull($_POST['product_id'])) {
			$this->error('请选择理财产品');
		}
	
	}
	
}