<?php if (!defined('THINK_PATH')) exit();?><div class="pageContent">
      <div class="panelBar">
            <ul class="toolBar">
                  <li><a class="add" href="/Admin/article/addcate" target="dialog" width="800" height="500"><span>添加</span></a></li>
                  <li class="line">line</li>
                  <!-- <li><a class="icon" href="demo/common/dwz-team.xls" target="dwzExport" targetType="navTab" title="实要导出这些记录吗?"><span>导出EXCEL</span></a></li> -->
            </ul>
      </div>
      <ul class="tree expand" id="cateTree">
      <?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li><a href="javascript:;" rel="<?php echo ($vo["cate_id"]); ?>"><?php echo ($vo["cate_name"]); ?>&nbsp;&nbsp;<strong class="k_edit">编辑</strong>&nbsp;&nbsp;<strong class="k_closed">关闭</strong></a>
                  <?php if(!empty($vo["_child"])): ?><ul>
                  <?php if(is_array($vo["_child"])): $i = 0; $__LIST__ = $vo["_child"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$child): $mod = ($i % 2 );++$i;?><li><a href="javascript:;" rel="<?php echo ($child["cate_id"]); ?>"><?php echo ($child["cate_name"]); ?>&nbsp;&nbsp;<strong class="k_edit">编辑</strong>&nbsp;&nbsp;<strong class="k_closed">关闭</strong></a></li><?php endforeach; endif; else: echo "" ;endif; ?> 
                  </ul><?php endif; ?>
            </li><?php endforeach; endif; else: echo "" ;endif; ?>
      </ul>
</div>
<script type="text/javascript">
      $('#cateTree strong').hide();
      $('#cateTree li a').hover(function(){
            $(this).children('strong').show();
      }, function(){
            $(this).children('strong').hide();
      });
      //编辑分类
      $('#cateTree strong.k_edit').click(function(){
            var cate_id = $(this).parent().attr('rel');
            $.pdialog.open('/Admin/article/editcate?cate_id=' + cate_id, 'editDialog', '编辑分类', {width : 800, height : 500});　

      });
      //删除分类
      $('#cateTree strong.k_closed').click(function(){
            var cate_id = $(this).parent().attr('rel');
            alertMsg.confirm('是否关闭该分类？', {
                  okCall: function(){
                        ajaxTodo('/Admin/article/closecate?cate_id=' + cate_id);
                  }
            });

      });
</script>