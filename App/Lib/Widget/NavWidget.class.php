<?php 
class NavWidget extends Widget{
	public function render($data){
		$pos = isset($data['tpl']) ? $data['tpl'] : 'main';
		$nav = M('Navconfig')->field('nav_id, pid, name, link')->where(array('pos' => $pos, 'status' => 0))->order('ordering ASC, nav_id DESC')->select();
		load("extend");
		$nav = list_to_tree($nav, 'nav_id', 'pid');
		$data['data'] = $nav;
		// dump($nav);
		return $this->renderFile($pos,$data);
	}
}