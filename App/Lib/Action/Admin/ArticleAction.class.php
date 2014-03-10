<?php
class ArticleAction extends Action {
    public function _initialize(){
        R('Admin/Public/check');
    }
    
    public function index(){
    	$page['pageNum'] = $this->_param('pageNum');
    	$page['pageNum'] = $page['pageNum'] ?: 1;
    	$page['numPerPage'] = $this->_param('numPerPage');
    	$page['numPerPage'] = $page['numPerPage'] ?: 20;
    	$page['offset'] = ($page['pageNum'] - 1) * $page['numPerPage'];

    	$order['orderField'] = $this->_param('orderField');
        $order['orderField'] = $order['orderField'] ?: 'article_id';
    	$order['orderDirection'] = $this->_param('orderDirection');
        $order['orderDirection'] = $order['orderDirection'] ?: 'asc';

    	$keywords = $this->_param('keywords', 'trim, htmlspecialchars', '');
    	$status = $this->_param('status');
        $cate_id = $this->_param('cate_id');

        $where = array();
    	if(!empty($keywords))
    		$where['title'] = array('like',"%$keywords%");;
    	if($status !== '')
    		$where['status'] = (int)$status;
        if($cate_id > 0)
            $where['cate_id'] = (int)$cate_id;


    	$Article = M('article');
    	$data = $Article->where($where)->order($order['orderField'] . ' ' . $order['orderDirection'])->limit($page['offset'],$page['numPerPage'])->select();
    	$count = $Article->where($where)->count();
    	$this->assign('data', $data);
    	$this->assign('count', $count);
    	$this->assign('page',$page);
    	$this->display();
    }

    public function search(){
    	$this->display();
    }

    public function add(){
        if($this->isPost()){
            $article = M('article');
            $article->create();
            $article->ctime = date('Y-m-d H:i:s');
            $article->content = htmlspecialchars($article->content, ENT_QUOTES);
            $article_id = $article->add();
            //图片处理
            $image = $this->_post('article_img');
            if($image){
                moveImage($article_id, $image, 'article_article');
                $article->save(array('article_id' => $article_id, 'article_img' => $image));
            }
            dwzAjaxReturn(200, '操作成功', 'article', '/Admin/article/index', 'closeCurrent');
        }
    	$this->display();
    }

    public function edit(){
        $article = M('article');
        $id = $this->_get('id');
        if(empty($id)){
            dwzAjaxReturn(300, '文章不存在！或已被删除');
        }
        if($this->isPost()){
            $article->create();
            $article->mtime = date('Y-m-d H:i:s');
            $article->content = htmlspecialchars($article->content, ENT_QUOTES);
            $article->article_id = $id;
            $article->save();            
            //图片处理
            $image = $this->_post('article_img');
            if($image && strpos($image, '/temp/') !== false){
                $image = moveImage($id, $image, 'article_article');
                $article->save(array('article_id' => $id, 'article_img' => $image));
            }
            dwzAjaxReturn(200, '操作成功', 'article', '/Admin/article/index', 'closeCurrent');
        }
        $data = $article->find($id);
        $this->assign('data',$data);
        $this->display();
    }

    public function del(){
        $article = M('article');
        $ids = $this->_request('ids');
        if(empty($ids)){
            dwzAjaxReturn(300, '文章不存在！或已被删除');
        }
        if($this->isPost()){
            if($article->delete($ids) > 0){
                dwzAjaxReturn(200, '操作成功', 'article', '/Admin/article/index');
            }
        }
    }

    public function cate(){
    	load("extend");
    	$cate = M('articleCate');
    	$data = $cate->where('status=0')->select();
    	$data = list_to_tree($data, 'cate_id', 'pid');
    	$this->assign('data',$data);
    	$this->display(); 
    }

    public function addcate(){
		$cate = M('articleCate');
		if($this->isPost()){
    		$cate->create();
    		$cate->ctime = date('Y-m-d H:i:s');
    		$cate_id = $cate->add();
            //图片处理
            $image = $this->_post('cate_img');
            if($image){
                $image = moveImage($cate_id, $image, 'article_cate');
                $cate->save(array('cate_id' => $cate_id, 'cate_img' => $image));
            }
            dwzAjaxReturn(200, '操作成功', 'articlecate', '/Admin/article/cate', 'closeCurrent');
    	}
    	$where = array('pid'=>0, 'status'=>0);
    	$pcate = $cate->where($where)->order('ordering')->select();
    	$this->assign('pcate',$pcate);
   		$this->display();
    }

    public function editcate(){
    	$cate = M('articleCate');
        $cate_id = $this->_get('cate_id');
        if(empty($cate_id)){
            dwzAjaxReturn(300, '分类不存在！或已被删除');
        }
    	if($this->isPost()){
    		$cate->create();
    		$cate->mtime = date('Y-m-d H:i:s');
            $cate->cate_id = $cate_id;
    		$cate->save();
            //图片处理
            $image = $this->_post('cate_img');
            if($image && strpos($image, '/temp/') !== false){
                $image = moveImage($cate_id, $image, 'article_cate');
                $cate->save(array('cate_id' => $cate_id, 'cate_img' => $image));
            }
            dwzAjaxReturn(200, '操作成功', 'articlecate', '/Admin/article/cate', 'closeCurrent');
    	}
        $data = $cate->find($cate_id);
    	$where = array('pid'=>0, 'status'=>0);
    	$pcate = $cate->where($where)->order('ordering')->select();
        $this->assign('pcate',$pcate);
    	$this->assign('data',$data);
    	$this->display();
    }

    public function closecate(){
        $cate = M('articleCate');
        $cate_id = $this->_get('cate_id');
        if(empty($cate_id)){
            dwzAjaxReturn(300, '分类不存在！或已被删除');
        }
        if($this->isPost()){
            $cate->status = 1;
            $cate->cate_id = $cate_id;
            $cate->save();
            dwzAjaxReturn(200, '操作成功', 'articlecate', '/Admin/article/cate');
        }
    }

    public function catebox(){
        load("extend");
        $cate = M('articleCate');
        $data = $cate->where('status=0')->select();
        $data = list_to_tree($data, 'cate_id', 'pid');
        $this->assign('data',$data);
        $this->display();
    }

    //配合xhEditor的图片上传
    public function imageupload(){
        $res = array('err' => '上传失败！', 'msg' => '');
        $imagepath = '/uploads/article/xhEditor/';
        import('ORG.Net.UploadFile');
        $upload = new UploadFile();// 实例化上传类
        $upload->maxSize  = 2097152 ;// 设置附件上传大小2M
        $upload->allowExts  = array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
        $upload->savePath =  ROOT_PATH . '/Public' . $imagepath;// 设置附件上传目录
        $upload->autoSub = true;
        $upload->subType = 'date';
        $upload->dateFormat = 'Ymd';
        if(!$upload->upload()) {// 上传错误提示错误信息
            $res['err'] = $upload->getErrorMsg();
        }else{// 上传成功 获取上传文件信息
            $image = $upload->getUploadFileInfo();
            $res['err'] = '';
            $res['msg'] =  $imagepath . $image[0]['savename'];
        }
        echo json_encode($res);
    }
}