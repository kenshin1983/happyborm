<?php if (!defined('THINK_PATH')) exit();?><div class="bread_nav">
	<a href='/'>首页</a>
	<?php if(is_array($bread)): $i = 0; $__LIST__ = $bread;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>&gt; <a href="<?php echo getCateLink($vo['cate_id'], $vo['cate_alpha']);?>"><?php echo ($vo["cate_name"]); ?></a><?php endforeach; endif; else: echo "" ;endif; ?>	 
</div>