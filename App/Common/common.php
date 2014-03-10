<?php 
/**
 * 获取文章分类的名称的方法，传入
 * 主要用于view层
 */
function cname($cate_id){
	$cateAssoc = M('articleCate')->cache('true', 3600)->getField('cate_id, cate_name');
	return $cateAssoc[$cate_id];
}

/**
 * 根据ID划分目录
 * @return string
 */
function getDirsById($id)
{
	$id = sprintf("%011d", $id);
	$dir1 = substr($id, 0, 3);
	$dir2 = substr($id, 3, 3);
	$dir3 = substr($id, 6, 3);
	$dir4 = substr($id, -2);
	return $dir1.'/'.$dir2.'/'.$dir3.'/'.$dir4;
}