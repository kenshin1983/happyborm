<?php if (!defined('THINK_PATH')) exit();?><ul>
	<?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li><a href='<?php echo ($vo["link"]); ?>'><?php echo ($vo["name"]); ?></a>  |  </li><?php endforeach; endif; else: echo "" ;endif; ?>
	<li>Copyright &copy; 2006-2013 美宝之家 版权所有</li>
</ul>