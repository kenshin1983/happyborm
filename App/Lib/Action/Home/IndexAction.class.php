<?php
class IndexAction extends Action {
    public function index(){
        //最新资讯
        $article = M('Article');
        $newsList = $article->field(array('article_id','title','cate_id'))
                            ->where(array('is_index' => 1, 'status' => 0))
                            ->order(array('ordering ASC','article_id DESC'))
                            ->limit(7)
                            ->select();
        $this->assign('newsList',$newsList);
    	$this->display();
    }

    public function detail(){
    	$article = M('Article');
    	$id = $this->_param('id');
        if(intval($id) > 0){
            $data = $article->find($id);
        }else{
            $data = $article->where(array('alpha' => $id))->find();
        }
    	if(!$data){
    		$this->error('文章不存在或已被删除！');
    		exit;
    	}
    	$this->assign('data',$data);
    	$this->assign('cate_id',$data['cate_id']);
    	$this->display();
    }

    public function cate(){
    	$cate = M('ArticleCate');
    	$id = $this->_param('id');
    	if(intval($id) > 0){
			$data = $cate->find($id);
    	}else{
    		$data = $cate->where(array('cate_alpha' => $id))->find();
    	}
    	if(!$data){
    		$this->error('分类不存在或已删除！');
    		exit;
    	}
        if($data['pid'] == 0){
            //大类，获取所有小类ID
            $cids = $cate->where(array('pid' => $data['cate_id'], 'status' => 0))->getField('cate_id', true);
        }
        $cids[] = $data['cate_id'];
    	$Article = M('Article');
		import('ORG.Util.Page');
		$where = array('cate_id' => array('in', $cids), 'status' => 0);
		$order = 'ordering ASC, article_id DESC';
		$field = 'article_id, title, ctime';
		$count = $Article->where($where)->count();
		$Page  = new Page($count,25);
		$show  = $Page->show();
		$list = $Article->where($where)->field($field)->order($order)->limit($Page->firstRow.','.$Page->listRows)->select();
    	$this->assign('data',$data);
    	$this->assign('cate_id',$data['cate_id']);
		$this->assign('list',$list);
		$this->assign('page',$show);
    	$this->display();
    }
}