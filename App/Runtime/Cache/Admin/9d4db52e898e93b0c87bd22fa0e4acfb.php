<?php if (!defined('THINK_PATH')) exit();?><div class="pageContent">
	<form method="post" action="/Admin/article/edit?id=<?php echo ($_GET['id']); ?>" class="pageForm required-validate" onsubmit="return validateCallback(this, navTabAjaxDone);">
		<div class="tabs" currentIndex="0" eventType="click">
			<div class="tabsHeader">
				<div class="tabsHeaderContent">
					<ul>
						<li><a href="javascript:;"><span>基本属性</span></a></li>
						<li><a href="javascript:;"><span>详细内容</span></a></li>
						<li><a href="javascript:;"><span>seo优化</span></a></li>
					</ul>
				</div>
			</div>
			<div class="tabsContent" layoutH="110">
				<div class="pageFormContent nowrap">
					<dl>
						<dt>标题：</dt>
						<dd>
							<input type="text" name="title" size="100" value="<?php echo ($data["title"]); ?>" class="required" />
						</dd>
					</dl>					
					<dl>
						<dt>别名：</dt>
						<dd>
							<input type="text" name="alpha" size="100" value="<?php echo ($data["alpha"]); ?>" />
						</dd>
					</dl>
					<dl>
						<dt>副标题：</dt>
						<dd>
							<input type="text" name="sub" size="100" value="<?php echo ($data["sub"]); ?>" />
						</dd>
					</dl>
					<dl>
						<dt>是否首页显示：</dt>
						<dd>
							<label><input type="radio" name="is_index" value="0" <?php if(($data["is_index"]) == "0"): ?>checked<?php endif; ?> />否</label>
							<label><input type="radio" name="is_index" value="1" <?php if(($data["is_index"]) == "1"): ?>checked<?php endif; ?> />是</label>
						</dd>
					</dl>
					<dl>
						<dt>状态：</dt>
						<dd>
							<label><input type="radio" name="status" value="0" <?php if(($data["status"]) == "0"): ?>checked<?php endif; ?> />开启</label>
							<label><input type="radio" name="status" value="1" <?php if(($data["status"]) == "1"): ?>checked<?php endif; ?> />关闭</label>
						</dd>
					</dl>
					<p>
						<label>分类：</label>
						<input type="hidden" name="cate.id" value="<?php echo ($data["cate_id"]); ?>"/>
						<input type="text" name="cate.name" value="<?php echo (cname($data["cate_id"])); ?>" readonly />
						<a class="btnLook" href="/Admin/article/catebox" lookupGroup="cate">文章分类</a>	
					</p>
					<p>
						<label>排序：</label>
						<input type="text" size="10" value="<?php echo ($data["ordering"]); ?>" name="ordering" class="digits" min="1" max="255" alt="请输入1-255的数字" >
					</p>
					<dl>
						<dt>图片：</dt>
						<dd>
							<div id="imageBox_article"><?php if(!empty($data["article_img"])): ?><img src="<?php echo ($data["article_img"]); ?>"  width="200" height="200" /><?php endif; ?></div>
							<input id="uploadInput_article" type="file" name="image" 
							uploaderOption="{
								swf:'/static/dwz/uploadify/scripts/uploadify.swf',
								uploader:'/Admin/index/upload',
								formData:{id:'article'},
								buttonText:'请选择文件',
								fileSizeLimit:'2MB',
								width:100,
								height:20,
								fileTypeDesc:'*.jpg;*.jpeg;*.gif;*.png;',
								fileTypeExts:'*.jpg;*.jpeg;*.gif;*.png;',
								onUploadSuccess:uploadifySuccess
							}"
							/>
							<input type="hidden" id="imageValue_article" name="article_img" value="<?php echo ($data["article_img"]); ?>" />
						</dd>
					</dl>
				</div>
				<div class="pageFormContent">
					<div class="unit">
						<textarea class="editor {height:'350'}" name="content" rows="8" cols="100"
							upImgUrl="/Admin/article/imageupload" upImgExt="jpg,jpeg,gif,png"><?php echo ($data["content"]); ?></textarea>
					</div>
				</div>
				<div class="pageFormContent nowrap">
					<dl>
						<dt>seo_title：</dt>
						<dd><input type="text" name="seo_title" size="100" value="<?php echo ($data["seo_title"]); ?>" /></dd>
					</dl>
					<dl>
						<dt>seo_keywords：</dt>
						<dd><input type="text" name="seo_keywords" size="100" value="<?php echo ($data["seo_keywords"]); ?>" /></dd>
					</dl>
					<dl class="nowrap">
						<dt>seo_description</dt>
						<dd><textarea name="seo_description" cols="100" rows="4"><?php echo ($data["seo_description"]); ?></textarea></dd>
					</dl>
				</div>
			</div>
			<div class="formBar">
				<ul>
					<li><div class="buttonActive"><div class="buttonContent"><button type="submit">保存</button></div></div></li>
					<li>
						<div class="button"><div class="buttonContent"><button type="button" class="close">取消</button></div></div>
					</li>
				</ul>
			</div>
		</div>
	</form>
</div>

<script type="text/javascript">
function uploadifySuccess(file, data, response){
	data = $.parseJSON(data);
	if(data.errorCode == 0){
		var image = '/temp/' + data.images[0].savename;
		$('#imageBox_' + data.id).html('<img src="' + image + '" width="200" height="200" />');
		$('#imageValue_' + data.id).val(image);
	}else{
		alert(data.errorMsg);
	}
}
</script>