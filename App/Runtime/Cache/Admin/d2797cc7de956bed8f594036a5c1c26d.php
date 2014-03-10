<?php if (!defined('THINK_PATH')) exit();?><div class="pageContent">     
      <div style=" float:left; display:block; margin:10px; overflow:auto; width:300px; height:500px; border:solid 1px #CCC; line-height:21px; background:#FFF;">
             <div class="panelBar">
                  <ul class="toolBar">
                        <li><span><?php echo navPosArr('main');?></span></li>
                        <li class="line">line</li>
                        <li><a class="add" href="/Admin/index/addnav?pos=main" target="dialog"><span>添加</span></a></li>
                        
                  </ul>
            </div>
            <ul class="tree expand">
                  <?php if(is_array($data["main"])): $i = 0; $__LIST__ = $data["main"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li><a href="/Admin/index/editnav?id=<?php echo ($vo["nav_id"]); ?>" target="dialog"><?php echo ($vo["name"]); ?></a>
                        <?php if(!empty($vo["_child"])): ?><ul>
                              <?php if(is_array($vo["_child"])): $i = 0; $__LIST__ = $vo["_child"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$child): $mod = ($i % 2 );++$i;?><li><a href="/Admin/index/editnav?id=<?php echo ($child["nav_id"]); ?>" target="dialog"><?php echo ($child["name"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
                        </ul><?php endif; ?>
                  </li><?php endforeach; endif; else: echo "" ;endif; ?>
            </ul>
      </div>
      <div style=" float:left; display:block; margin:10px; overflow:auto; width:300px; height:500px; border:solid 1px #CCC; line-height:21px; background:#FFF;">
             <div class="panelBar">
                  <ul class="toolBar">
                        <li><span><?php echo navPosArr('top');?></span></li>
                        <li class="line">line</li>
                        <li><a class="add" href="/Admin/index/addnav?pos=top" target="dialog"><span>添加</span></a></li>
                  </ul>
            </div>
            <ul class="tree expand">
                  <?php if(is_array($data["top"])): $i = 0; $__LIST__ = $data["top"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li><a href="/Admin/index/editnav?id=<?php echo ($vo["nav_id"]); ?>" target="dialog"><?php echo ($vo["name"]); ?></a>
                        <?php if(!empty($vo["_child"])): ?><ul>
                              <?php if(is_array($vo["_child"])): $i = 0; $__LIST__ = $vo["_child"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$child): $mod = ($i % 2 );++$i;?><li><a href="/Admin/index/editnav?id=<?php echo ($child["nav_id"]); ?>" target="dialog"><?php echo ($child["name"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
                        </ul><?php endif; ?>
                  </li><?php endforeach; endif; else: echo "" ;endif; ?>
            </ul>
      </div>
      <div style=" float:left; display:block; margin:10px; overflow:auto; width:300px; height:500px; border:solid 1px #CCC; line-height:21px; background:#FFF;">
             <div class="panelBar">
                  <ul class="toolBar">
                        <li><span><?php echo navPosArr('bottom');?></span></li>
                        <li class="line">line</li>
                        <li><a class="add" href="/Admin/index/addnav?pos=bottom" target="dialog"><span>添加</span></a></li>
                  </ul>
            </div>
            <ul class="tree expand">
                  <?php if(is_array($data["bottom"])): $i = 0; $__LIST__ = $data["bottom"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li><a href="/Admin/index/editnav?id=<?php echo ($vo["nav_id"]); ?>" target="dialog"><?php echo ($vo["name"]); ?></a>
                        <?php if(!empty($vo["_child"])): ?><ul>
                              <?php if(is_array($vo["_child"])): $i = 0; $__LIST__ = $vo["_child"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$child): $mod = ($i % 2 );++$i;?><li><a href="/Admin/index/editnav?id=<?php echo ($child["nav_id"]); ?>" target="dialog"><?php echo ($child["name"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
                        </ul><?php endif; ?>
                  </li><?php endforeach; endif; else: echo "" ;endif; ?>
            </ul>
      </div>
</div>