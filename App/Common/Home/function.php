<?php 
/**
 * 获取配置信息 
 * 
 */
function getConfig($id){
	$data = cache('webconfig');
	if(!$data){
		$webconfig = M('webconfig');
		$data = $webconfig->where('status = 0')->getField('id,value');
		cache('webconfig', $data);
	}
	return isset($data[$id]) ? $data[$id] : '';	
}

/**
 * 通过分类id，alpha生成分类链接
 * 
 */
function getCateLink($id, $alpha = ''){
	$link = '/index/cate/id/';
	$link .= $alpha ?: $id;
	return $link;
}

/**
 * 通过文章id生成文章链接
 * 
 */
function getArticleLink($id){
	$link = '/index/detail/id/' . $id;
	return $link;
}

/**
 * 前台格式化时间
 * 输入时间格式2012-10-30 12:12:12
 * 输出时间格式2012/10/30
 * 
 */
function formatDate($date){
	return date('Y-m-d', strtotime($date));
}