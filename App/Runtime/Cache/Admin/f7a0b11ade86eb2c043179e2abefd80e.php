<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=7" />
<title>简单实用国产jQuery UI框架 - DWZ富客户端框架(J-UI.com)</title>

<link href="/static/dwz/themes/default/style.css" rel="stylesheet" type="text/css" media="screen"/>
<link href="/static/dwz/themes/css/core.css" rel="stylesheet" type="text/css" media="screen"/>
<link href="/static/dwz/themes/css/print.css" rel="stylesheet" type="text/css" media="print"/>
<link href="/static/dwz/uploadify/css/uploadify.css" rel="stylesheet" type="text/css" media="screen"/>
<!--[if IE]>
<link href="/static/dwz/themes/css/ieHack.css" rel="stylesheet" type="text/css" media="screen"/>
<![endif]-->

<!--[if lte IE 9]>
<script src="/static/dwz/js/speedup.js" type="text/javascript"></script>
<![endif]-->

<script src="/static/dwz/js/jquery-1.7.2.js" type="text/javascript"></script>
<script src="/static/dwz/js/jquery.cookie.js" type="text/javascript"></script>
<script src="/static/dwz/js/jquery.validate.js" type="text/javascript"></script>
<script src="/static/dwz/js/jquery.bgiframe.js" type="text/javascript"></script>
<script src="/static/dwz/xheditor/xheditor-1.1.14-zh-cn.min.js" type="text/javascript"></script>
<script src="/static/dwz/uploadify/scripts/jquery.uploadify.js" type="text/javascript"></script>

<!-- svg图表  supports Firefox 3.0+, Safari 3.0+, Chrome 5.0+, Opera 9.5+ and Internet Explorer 6.0+ -->
<!-- <script type="text/javascript" src="/static/dwz/chart/raphael.js"></script>
<script type="text/javascript" src="/static/dwz/chart/g.raphael.js"></script>
<script type="text/javascript" src="/static/dwz/chart/g.bar.js"></script>
<script type="text/javascript" src="/static/dwz/chart/g.line.js"></script>
<script type="text/javascript" src="/static/dwz/chart/g.pie.js"></script>
<script type="text/javascript" src="/static/dwz/chart/g.dot.js"></script> -->

<script src="/static/dwz/js/dwz.core.js" type="text/javascript"></script>
<script src="/static/dwz/js/dwz.util.date.js" type="text/javascript"></script>
<script src="/static/dwz/js/dwz.validate.method.js" type="text/javascript"></script>
<script src="/static/dwz/js/dwz.regional.zh.js" type="text/javascript"></script>
<script src="/static/dwz/js/dwz.barDrag.js" type="text/javascript"></script>
<script src="/static/dwz/js/dwz.drag.js" type="text/javascript"></script>
<script src="/static/dwz/js/dwz.tree.js" type="text/javascript"></script>
<script src="/static/dwz/js/dwz.accordion.js" type="text/javascript"></script>
<script src="/static/dwz/js/dwz.ui.js" type="text/javascript"></script>
<script src="/static/dwz/js/dwz.theme.js" type="text/javascript"></script>
<script src="/static/dwz/js/dwz.switchEnv.js" type="text/javascript"></script>
<script src="/static/dwz/js/dwz.alertMsg.js" type="text/javascript"></script>
<script src="/static/dwz/js/dwz.contextmenu.js" type="text/javascript"></script>
<script src="/static/dwz/js/dwz.navTab.js" type="text/javascript"></script>
<script src="/static/dwz/js/dwz.tab.js" type="text/javascript"></script>
<script src="/static/dwz/js/dwz.resize.js" type="text/javascript"></script>
<script src="/static/dwz/js/dwz.dialog.js" type="text/javascript"></script>
<script src="/static/dwz/js/dwz.dialogDrag.js" type="text/javascript"></script>
<script src="/static/dwz/js/dwz.sortDrag.js" type="text/javascript"></script>
<script src="/static/dwz/js/dwz.cssTable.js" type="text/javascript"></script>
<script src="/static/dwz/js/dwz.stable.js" type="text/javascript"></script>
<script src="/static/dwz/js/dwz.taskBar.js" type="text/javascript"></script>
<script src="/static/dwz/js/dwz.ajax.js" type="text/javascript"></script>
<script src="/static/dwz/js/dwz.pagination.js" type="text/javascript"></script>
<script src="/static/dwz/js/dwz.database.js" type="text/javascript"></script>
<script src="/static/dwz/js/dwz.datepicker.js" type="text/javascript"></script>
<script src="/static/dwz/js/dwz.effects.js" type="text/javascript"></script>
<script src="/static/dwz/js/dwz.panel.js" type="text/javascript"></script>
<script src="/static/dwz/js/dwz.checkbox.js" type="text/javascript"></script>
<script src="/static/dwz/js/dwz.history.js" type="text/javascript"></script>
<script src="/static/dwz/js/dwz.combox.js" type="text/javascript"></script>
<script src="/static/dwz/js/dwz.print.js" type="text/javascript"></script>
<!--
<script src="bin/dwz.min.js" type="text/javascript"></script>
-->
<script src="/static/dwz/js/dwz.regional.zh.js" type="text/javascript"></script>

<script type="text/javascript">
$(function(){
	DWZ.init("/static/dwz/dwz.frag.xml", {
		loginUrl:"/Admin/public/login", loginTitle:"登录",	// 弹出登录对话框
//		loginUrl:"login.html",	// 跳到登录页面
		statusCode:{ok:200, error:300, timeout:301}, //【可选】
		pageInfo:{pageNum:"pageNum", numPerPage:"numPerPage", orderField:"orderField", orderDirection:"orderDirection"}, //【可选】
		debug:false,	// 调试模式 【true|false】
		callback:function(){
			initEnv();
			$("#themeList").theme({themeBase:"/static/dwz/themes"}); // themeBase 相对于index页面的主题base路径
		}
	});
});

</script>
</head>

<body scroll="no">
	<div id="layout">
		<!-- header -->
		<div id="header">
	<div class="headerNav">
		<a class="logo" href="###">标志</a>
		<ul class="nav">
			<li><a href="https://me.alipay.com/kenshin1983" target="_blank">捐赠</a></li>
			<!-- <li><a href="changepwd.html" target="dialog" width="600">设置</a></li> -->
			<!-- <li><a href="http://www.cnblogs.com/dwzjs" target="_blank">博客</a></li> -->
			<!-- <li><a href="http://weibo.com/dwzui" target="_blank">微博</a></li> -->
			<!-- <li><a href="http://bbs.dwzjs.com" target="_blank">论坛</a></li> -->
			<li><a href="/Admin/Public/login">退出</a></li>
		</ul>
		<ul class="themeList" id="themeList">
			<li theme="default"><div class="selected">蓝色</div></li>
			<li theme="green"><div>绿色</div></li>
			<!-- <li theme="red"><div>红色</div></li> -->
			<li theme="purple"><div>紫色</div></li>
			<li theme="silver"><div>银色</div></li>
			<li theme="azure"><div>天蓝</div></li>
		</ul>
	</div>
</div>
		<!-- header -->
		<!-- sidebar -->
		<div id="leftside">
	<div id="sidebar_s">
		<div class="collapse">
			<div class="toggleCollapse"><div></div></div>
		</div>
	</div>
	<div id="sidebar">
		<div class="toggleCollapse"><h2>主菜单</h2><div>收缩</div></div>
		<div class="accordion" fillSpace="sidebar">
			<div class="accordionHeader">
				<h2><span>Folder</span>界面组件</h2>
			</div>
			<div class="accordionContent">
				<ul class="tree treeFolder">
					<li><a>系统管理</a>
						<ul>
							<!-- <li><a href="/Admin/index/system" target="navTab" rel="main">系统信息</a></li> -->
							<li><a href="/Admin/index/webconfig" target="navTab" rel="webconfig">站点配置</a></li>
							<li><a href="/Admin/index/navconfig" target="navTab" rel="navconfig">导航管理</a></li>
						</ul>
					</li>
					<li><a>文章管理</a>
						<ul>
							<li><a href="/Admin/article/index" target="navTab" rel="article">文章列表</a></li>
							<li><a href="/Admin/article/cate" target="navTab" rel="articlecate">分类管理</a></li>
						</ul>
					</li>
				</ul>
			</div>
		</div>
	</div>
</div>

		
		<!-- sidebar -->

		<div id="container">
			<div id="navTab" class="tabsPage">
				<div class="tabsPageHeader">
					<div class="tabsPageHeaderContent"><!-- 显示左右控制时添加 class="tabsPageHeaderMargin" -->
						<ul class="navTab-tab">
							<li tabid="main" class="main"><a href="javascript:;"><span><span class="home_icon">Welcome</span></span></a></li>
						</ul>
					</div>
					<div class="tabsLeft">left</div><!-- 禁用只需要添加一个样式 class="tabsLeft tabsLeftDisabled" -->
					<div class="tabsRight">right</div><!-- 禁用只需要添加一个样式 class="tabsRight tabsRightDisabled" -->
					<div class="tabsMore">more</div>
				</div>
				<ul class="tabsMoreList">
					<li><a href="javascript:;">Welcome</a></li>
				</ul>
				<div class="navTab-panel tabsPageContent layoutBox">
					<div class="page unitBox">
						<h2 class="contentTitle">弹出窗口</h2>
						<div class="pageFormContent nowrap">
							<?php if(is_array($checkdirs)): $i = 0; $__LIST__ = $checkdirs;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><dl>
									<dt><?php echo ($vo["name"]); ?></dt>
									<dd><?php if(($vo["status"]) == "1"): ?>可写<?php else: ?>不可写<?php endif; ?></dd>
								</dl><?php endforeach; endif; else: echo "" ;endif; ?>
						</div>
						<h2 class="contentTitle">清除缓存</h2>
						<div class="pageFormContent nowrap">
							<?php if(is_array($caches)): $i = 0; $__LIST__ = $caches;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><dl>
									<dt><?php echo ($vo["name"]); ?></dt>
									<dd><a class="button" href="/Admin/index/clearcache?tag=<?php echo ($vo["tag"]); ?>"><span>清除</span></a></dd>
								</dl><?php endforeach; endif; else: echo "" ;endif; ?>
						</div>
					</div>					
				</div>
			</div>
		</div>
	</div>
	<!-- sidebar -->
		<div id="footer">Copyright &copy; 2013 <a href="###" target="dialog">KENSHIN</a> Tel：13675897772</div>				
	<!-- sidebar -->
</body>
</html>