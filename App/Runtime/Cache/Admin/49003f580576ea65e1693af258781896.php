<?php if (!defined('THINK_PATH')) exit();?><div class="pageContent">
	<form method="post" action="/Admin/index/webconfig" class="pageForm required-validate" onsubmit="return validateCallback(this, navTabAjaxDone);">
		<div class="tabs" currentIndex="0" eventType="click">
			<div class="tabsHeader">
				<div class="tabsHeaderContent">
					<ul>
						<?php if(is_array($tabAssoc)): $i = 0; $__LIST__ = $tabAssoc;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li><a href="javascript:;"><span><?php echo ($vo); ?></span></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
					</ul>
				</div>
			</div>
			<div class="tabsContent" layoutH="70">
				<?php if(is_array($tabAssoc)): $k = 0; $__LIST__ = $tabAssoc;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($k % 2 );++$k;?><div class="pageFormContent nowrap">
						<?php if(is_array($data[$k-1])): $i = 0; $__LIST__ = $data[$k-1];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?><dl>
								<dt><?php echo ($item["name"]); ?>：</dt>
								<dd><?php echo configTpl($item);?></dd>
								<span style="line-height:21px"><?php echo ($item["desc"]); ?></span>
							</dl><?php endforeach; endif; else: echo "" ;endif; ?>
					</div><?php endforeach; endif; else: echo "" ;endif; ?>
			</div>
			<div class="formBar">
				<ul>
					<li><div class="buttonActive"><div class="buttonContent"><button type="submit">保存</button></div></div></li>
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
		$('#imageBox_' + data.id).html('<img src="' + image + '" width="100" height="100" />');
		$('#imageValue_' + data.id).val(image);
	}else{
		alert(data.errorMsg);
	}
}
</script>