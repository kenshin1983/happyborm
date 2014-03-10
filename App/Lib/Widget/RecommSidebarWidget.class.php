<?php 
class RecommSidebarWidget extends Widget{

	public function render($data){
		$catelist = M('ArticleCate')->field('cate_id, cate_name, cate_alpha')->where('is_sidebar = 1 AND status = 0')->order('ordering ASC, cate_id DESC')->select();
		if($catelist){
			$articleModel = M('Article');
			$order = 'ordering ASC, article_id DESC';
			$where = array('status' => 0);
			foreach ($catelist as $k => $cate) {
				$where['cate_id'] = $cate['cate_id'];
				$data['data'][$k]['cate'] = $cate;
				$data['data'][$k]['article'] = $articleModel->field('article_id, title')->where($where)->order($order)->select();
			}
		}
		return $this->renderFile('',$data);
	}
}