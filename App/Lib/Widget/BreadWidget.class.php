<?php 
class BreadWidget extends Widget{
	public function render($data){
		$cate_id = $data['cate_id'];
		$cateModel = M('ArticleCate');
		$field = 'cate_id, cate_name, cate_alpha, pid';
		$order = 'ordering ASC, cate_id ASC';
		$where = array('status' => 0);
		$cate = $cateModel->field($field)->find($cate_id);
		if($cate['pid'] > 0){
			$data['bread'][] = $cateModel->field($field)->find($cate['pid']);
		}
		$data['bread'][] = $cate;
		return $this->renderFile('', $data);
	}
}