<?php if (!defined('THINK_PATH')) exit();?><form id="pagerForm" method="post" action="#rel#">
	<input type="hidden" name="pageNum" value="<?php echo ($page["pageNum"]); ?>" />
	<input type="hidden" name="numPerPage" value="<?php echo ($page["numPerPage"]); ?>" />
	<input type="hidden" name="orderField" value="<?php echo ($_REQUEST['orderField']); ?>" />
	<input type="hidden" name="orderDirection" value="<?php echo ($_REQUEST['orderDirection']); ?>" />
</form>

<div class="pageHeader">
	<form rel="pagerForm" onsubmit="return navTabSearch(this);" action="/Admin/article/index" method="post">
	<div class="searchBar">
		<ul class="searchContent">
			<li>
				<label>标题关键字：</label>
				<input type="text" name="keywords" value="<?php echo ($_REQUEST['keywords']); ?>"/>
			</li>
			<li>
				<label>分类筛选：</label>
				<input type="hidden" name="cate.id" value="<?php echo ($_REQUEST['cate_id']); ?>" />
				<input type="text" style="float:left" class="required" name="cate.name" value="<?php echo (cname($_REQUEST['cate_id'])); ?>" readonly />
				<a class="btnLook" href="/Admin/article/catebox" lookupGroup="cate">文章分类</a>	
			</li>
			<li>
				<label>状态筛选：</label>
				<select class="combox" name="status">
					<option value="">所有</option>
					<option value="0" <?php if(($_REQUEST['status']) == "0"): ?>selected<?php endif; ?>>开启</option>
					<option value="1" <?php if(($_REQUEST['status']) == "1"): ?>selected<?php endif; ?>>关闭</option>
				</select>
			</li>
		</ul>		
		<div class="subBar">
			<ul>
				<li><div class="buttonActive"><div class="buttonContent"><button type="submit">检索</button></div></div></li>
				<!-- <li><a class="button" href="/Admin/article/search" target="dialog" mask="true" title="查询框"><span>高级检索</span></a></li> -->
			</ul>
		</div>
	</div>
	</form>
</div>
<div class="pageContent">
	<div class="panelBar">
		<ul class="toolBar">
			<li><a class="add" href="/Admin/article/add" target="navTab" title="添加文章"><span>添加</span></a></li>
			<li><a class="edit" href="/Admin/article/edit?id={article_id}" target="navTab" warn="请选择文章" title="修改文章"><span>修改</span></a></li>
			<li><a title="删除无法恢复，确实要删除这些文章吗?" target="selectedTodo" rel="ids" postType="string" href="/Admin/article/del" class="delete"><span>批量删除</span></a></li>
			<li class="line">line</li>
			<!-- <li><a class="icon" href="demo/common/dwz-team.xls" target="dwzExport" targetType="navTab" title="实要导出这些记录吗?"><span>导出EXCEL</span></a></li> -->
		</ul>
	</div>
	<table class="table" width="1160" layoutH="138">
		<thead>
			<tr>
				<th width="22"><input type="checkbox" group="ids" class="checkboxCtrl"></th>
				<th width="40" orderField="article_id" <?php if(($_REQUEST['orderField']) == "article_id"): ?>class="<?php echo ($_REQUEST['orderDirection']); ?>"<?php endif; ?>>ID</th>
				<th>标题</th>
				<th width="150">分类</th>
				<th width="150" align="center" orderField="ctime" <?php if(($_REQUEST['orderField']) == "ctime"): ?>class="<?php echo ($_REQUEST['orderDirection']); ?>"<?php endif; ?>>添加时间</th>
				<th width="150" align="center" orderField="mtime" <?php if(($_REQUEST['orderField']) == "mtime"): ?>class="<?php echo ($_REQUEST['orderDirection']); ?>"<?php endif; ?>>修改时间</th>
				<th width="60" align="center" orderField="ordering" <?php if(($_REQUEST['orderField']) == "ordering"): ?>class="<?php echo ($_REQUEST['orderDirection']); ?>"<?php endif; ?>>排序</th>
				<th width="60" align="center">状态</th>
				<th width="70">操作</th>
			</tr>
		</thead>
		<tbody>
			<?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr target="article_id" rel="<?php echo ($vo["article_id"]); ?>">
				<td><input name="ids" value="<?php echo ($vo["article_id"]); ?>" type="checkbox"></td>
				<td><?php echo ($vo["article_id"]); ?></td>
				<td><?php echo ($vo["title"]); ?></td>
				<td><?php echo (cname($vo["cate_id"])); ?></td>
				<td><?php echo ($vo["ctime"]); ?></td>
				<td><?php echo ($vo["mtime"]); ?></td>
				<td><?php echo ($vo["ordering"]); ?></td>
				<td><?php echo ($vo['status'] ? '关闭' : '开启'); ?></td>
				<td>
					<a title="删除后无法恢复，确认删除？" target="ajaxTodo" href="/Admin/article/del?ids=<?php echo ($vo["article_id"]); ?>" class="btnDel">删除</a>
					<a title="修改文章" target="navTab" href="/Admin/article/edit?id=<?php echo ($vo["article_id"]); ?>" class="btnEdit">修改</a>
				</td>
			</tr><?php endforeach; endif; else: echo "" ;endif; ?>
		</tbody>
	</table>
	<div class="panelBar">
		<div class="pages">
			<span>显示</span>
			<select class="combox" name="numPerPage" onchange="navTabPageBreak({numPerPage:this.value})">
				<option value="20" <?php if(($page["numPerPage"]) == "20"): ?>selected<?php endif; ?>>20</option>
				<option value="50" <?php if(($page["numPerPage"]) == "50"): ?>selected<?php endif; ?>>50</option>
				<option value="100" <?php if(($page["numPerPage"]) == "100"): ?>selected<?php endif; ?>>100</option>
				<option value="200" <?php if(($page["numPerPage"]) == "200"): ?>selected<?php endif; ?>>200</option>
			</select>
			<span>条，共<?php echo ($count); ?>条</span>
		</div>
		
		<div class="pagination" targetType="navTab" totalCount="<?php echo ($count); ?>" numPerPage="<?php echo ($page["numPerPage"]); ?>" pageNumShown="10" currentPage="<?php echo ($page["pageNum"]); ?>"></div>

	</div>
</div>