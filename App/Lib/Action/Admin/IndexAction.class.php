<?php
// 本类由系统自动生成，仅供测试用途
class IndexAction extends Action {
    public function _initialize(){
        R('Admin/Public/check');
    }
    public function index(){
        //检测目录是否可写
        //要检测的目录
        $checkdirs = array(
            array(
                'name'      => '临时目录',
                'status'    => is_writable(ROOT_PATH . '/Public/temp')
            ),
            array(
                'name'      => '图片目录',
                'status'    => is_writable(ROOT_PATH . '/Public/uploads')
            ),
            array(
                'name'      => '缓存目录',
                'status'    => is_writable(RUNTIME_PATH)
            )
        );
        //缓存目录
        $caches = array(
            array(
                'name'   => '前台模板缓存',
                'tag'    => 'cache_home'
            ),
            array(
                'name'   => '后台模板缓存',
                'tag'    => 'cache_admin'
            ),
            array(
                'name'   => '数据缓存',
                'tag'    => 'data'
            ),
            array(
                'name'   => '日志信息',
                'tag'    => 'logs'
            ),
            array(
                'name'   => '临时缓存',
                'tag'    => 'temp'
            )
        );
        $this->assign('checkdirs',$checkdirs);
        $this->assign('caches',$caches);
    	$this->display();
    }

    public function clearcache(){
        $tag = $this->_param('tag');
        if($tag){
            $dir = RUNTIME_PATH . implode('/', array_map('ucfirst', explode('_', $tag)));
            clearDir($dir);
        }
        $this->redirect('index');
    }

    public function system(){
    	$this->display();
    }

    public function webconfig(){
    	$webconfig = M('webconfig');
    	if($this->isPost()){
    		$data = $this->_post();
    		$webconfig->startTrans();
    		try {
    			foreach ($data as $id => $value) {
	    			$webconfig->where(array('id' => $id))->save(array('value' => $value));
	    		}
	    		$webconfig->commit();
    		} catch (Exception $e) {
    			$webconfig->rollback();
    			dwzAjaxReturn(300, $e->getMessage());
    		}
            if(strpos($data['SITE_LOGO'], '/temp/') !== false){
                $image = moveImage(0, $data['SITE_LOGO'], 'logo');
                $webconfig->where(array('id' => 'SITE_LOGO'))->save(array('value' => $image));
            }
            dwzAjaxReturn(200, '操作成功', 'webconfig', '/Admin/index/webconfig');

    	}

    	$tabAssoc = array('基本设置', 'SEO优化');
    	$config = $webconfig->where(array('status' => 0))->order('ordering ASC')->select();
    	$data = array();
    	foreach ($config as $value) {
    		$data[$value['tab']][] = $value;
    	}
    	$this->assign('tabAssoc',$tabAssoc);
    	$this->assign('data',$data);
    	$this->display();
    }

    public function navconfig(){
        load("extend");
        $data = array();
        $nav = M('Navconfig');
        $where = array('status' => 0);
        $list = $nav->where('status=0')->order('ordering ASC, nav_id DESC')->select();
        foreach ($list as $value) {
            $data[$value['pos']][] = $value;
        }
        foreach ($data as $pos => $value) {
            $data[$pos] = list_to_tree($value, 'nav_id', 'pid');
        }
        $this->assign('data',$data);
        $this->display(); 
    }

    public function addnav(){
        $navconfig = M('Navconfig');
        $pos = $this->_param('pos', false, 'main');
        if($this->isPost()){
            $navconfig->create();
            $navconfig->ctime = date('Y-m-d H:i:s');
            $nav_id = $navconfig->add();
            dwzAjaxReturn(200, '操作成功', 'navconfig', '/Admin/index/navconfig', 'closeCurrent');
        }
        $where = array('pid'=>0, 'status'=>0, 'pos'=>$pos);
        $pnav = $navconfig->where($where)->order('ordering')->select();
        $this->assign('pnav',$pnav);
        $this->assign('pos',$pos);
        $this->display();
    }

    public function editnav(){
        $navconfig = M('Navconfig');
        $nav_id = $this->_get('id');
        if(empty($nav_id)){
            dwzAjaxReturn(300, '导航不存在！或已被删除');
        }
        if($this->isPost()){
            $navconfig->create();
            $navconfig->mtime = date('Y-m-d H:i:s');
            $navconfig->nav_id = $nav_id;
            $navconfig->save();
            dwzAjaxReturn(200, '操作成功', 'navconfig', '/Admin/index/navconfig', 'closeCurrent');
        }
        $data = $navconfig->find($nav_id);
        $where = array('pid'=>0, 'status'=>0, 'pos'=>$data['pos']);
        $pnav = $navconfig->where($where)->order('ordering')->select();
        $this->assign('pnav',$pnav);
        $this->assign('data',$data);
        $this->display();
    }

    public function closenav(){
        $cate = M('Navconfig');
        $nav_id = $this->_get('id');
        if(empty($nav_id)){
            dwzAjaxReturn(300, '导航不存在！或已被删除');
        }
        if($this->isPost()){
            $cate->status = 1;
            $cate->nav_id = $nav_id;
            $cate->save();
            dwzAjaxReturn(200, '操作成功', 'navconfig', '/Admin/index/navconfig', 'closeCurrent');
        }
    }

    //后台文件上传通用控制器
    public function upload(){
    	$res = array('errorCode' => 1, 'errorMsg' => '', 'images' => null);
    	import('ORG.Net.UploadFile');
		$upload = new UploadFile();// 实例化上传类
		$upload->maxSize  = 2097152 ;// 设置附件上传大小2M
		$upload->allowExts  = array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
		$upload->savePath =  './temp/';// 设置附件上传目录
		$upload->autoSub = true;
		$upload->subType = 'date';
		$upload->dateFormat = 'Ymd';
		if(!$upload->upload()) {// 上传错误提示错误信息
			$res['errorMsg'] = $upload->getErrorMsg();
		}else{// 上传成功 获取上传文件信息
			$res['errorCode'] = 0;
			$res['errorMsg'] = '[OK]';
            $res['id'] = $this->_param('id');
			$res['images'] = $upload->getUploadFileInfo();
		}
		echo json_encode($res);
    }
}