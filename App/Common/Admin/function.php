<?php 
/**
 * 配合dwz ajax 表单提交 返回的json数据，
 * 输入的参数和navTabAjaxDone参数一致
 * {"statusCode":"200", "message":"操作成功", "navTabId":"navNewsLi", "forwardUrl":"", "callbackType":"closeCurrent", "rel"."xxxId"}
 * {"statusCode":"300", "message":"操作失败"}
 * {"statusCode":"301", "message":"会话超时"}
 */
function dwzAjaxReturn($statusCode=200, $message="操作成功", $navTabId="", $forwardUrl="", $callbackType="", $rel=""){
	if($statusCode == 200){
		$returnJson = array(
			'statusCode'	=> 200,
			'message'		=> $message,
			'navTabId'		=> $navTabId,
			'forwardUrl'	=> $forwardUrl,
			'callbackType'	=> $callbackType,
			'rel'			=> $rel
		);
	}else{
		$returnJson = array(
			'statusCode'	=> $statusCode,
			'message'		=> $message
		);
	}
	echo json_encode($returnJson);
	exit;
}

/**
 * 模板输出config 表单
 */
function configTpl($config){
	switch ($config['type']) {
		case 'text':
			$tpl = "<input type=\"text\" name=\"{$config['id']}\" size=\"100\" value=\"{$config['value']}\" />";
			break;
		case 'textarea':
			$tpl = "<textarea name=\"{$config['id']}\" cols=\"85\" rows=\"4\">{$config['value']}</textarea>";
			break;
		case 'radio':
			$opt = json_decode($config['opt']);
			$tpl = '';
			foreach ($opt as $v => $name) {
				$checked = $v == $config['value'] ? 'checked' : '';
				$tpl .= "<label><input type=\"radio\" name=\"{$config['id']}\" value=\"{$v}\" {$checked} />{$name}</label>";
			}
			break;
		case 'upload':
			$image = '';
			if(!empty($config['value'])){
				$image = '<img src="'.$config['value'].'"  width="100" height="100" />';
			}
			$tpl = <<<TEXT
				<div id="imageBox_{$config['id']}">{$image}</div>
				<input id="uploadInput_{$config['id']}" type="file" name="image"
					uploaderOption="{
						swf:'/static/dwz/uploadify/scripts/uploadify.swf',
						uploader:'/Admin/index/upload',
						formData:{id:'{$config['id']}'},
						buttonText:'请选择文件',
						fileSizeLimit:'2MB',
						width:100,
						height:20,
						fileTypeDesc:'*.jpg;*.jpeg;*.gif;*.png;',
						fileTypeExts:'*.jpg;*.jpeg;*.gif;*.png;',
						onUploadSuccess:uploadifySuccess
					}"
				'/>
				<input type="hidden" id="imageValue_{$config['id']}" name="{$config['id']}" value="{$config['value']}" />
TEXT;
			break;
		
		default:
			# code...
			break;
	}

	return $tpl;
}

/**
 * 移动上传文件到指定目录
 * @param int $id 模块ID
 * @param string $tempPath 图片临时目录
 * @param string $dir 格式化路径 如：article_cate = uploads/article/cate/
 */
function moveImage($id, $tempPath, $dir){
	$from = ROOT_PATH . '/Public' . $tempPath;
	$ext = end(explode('.', $tempPath));
	$root = ROOT_PATH . '/Public';
	$path .= '/uploads/' . str_replace('_', '/', $dir) . '/';
	if($id > 0){
		$path .= getDirsById($id) . '/';
	}
	if(!is_dir($root . $path)) mkdir($root . $path,0755,true);
	$file = md5($dir . '_' . $id) . '.' . $ext;
	$to = $root . $path . $file;
	copy($from, $to);
	return $path . $file;
}

/**
 * 返回navconfig名称
 */
function navPosArr($name = ''){
	$array = array(
		'main'	=> '主导航',
		'top'	=> '顶部导航',
		'bottom'=> '底部导航'
	);
	return $name ? $array[$name] : $array;
}

/**
 * 清空目录
 */
function clearDir($dir){
	if(is_dir($dir)){
		$halt = opendir($dir);
		while ($f = readdir($halt)) {
			if($f == '.' || $f == '..') continue;
			clearDir($dir . '/' . $f);
		}
	}elseif(is_file($dir)){
		unlink($dir);
	}
}