<?php 
class CateWidget extends Widget{
	public function render($data){
		$cate_id = $data['cate_id'];
		$cateModel = M('ArticleCate');
		$field = 'cate_id, cate_name, cate_alpha, pid';
		$order = 'ordering ASC, cate_id ASC';
		$where = array('status' => 0);
		$cate = $cateModel->field($field)->find($cate_id);
		if($cate['pid'] == 0){
			$where['pid'] = $cate['cate_id'];
			$data['children'] = $cateModel->field($field)->where($where)->order($order)->select();
			$data['parent'] = $cate;
		}else{
			$where['pid'] = $cate['pid'];
			$data['children'] = $cateModel->field($field)->where($where)->order($order)->select();
			$data['parent'] = $cateModel->field($field)->find($cate['pid']);
		}
		return $this->renderFile('', $data);
	}
}