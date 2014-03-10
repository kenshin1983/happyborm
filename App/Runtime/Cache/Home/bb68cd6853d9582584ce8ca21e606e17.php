<?php if (!defined('THINK_PATH')) exit();?><ul class="header_sub_nav">
	<li><a href="/">首页</a></li>
	<?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li> | <a href="<?php echo ($vo["link"]); ?>"><?php echo ($vo["name"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
    <li> | <a href="#" onClick="addfav()">收藏我们</a>
</ul>