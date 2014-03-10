<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<title><?php echo getConfig('SEO_TITLE');?></title>
<link href="/static/happy/image/basic.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div class="header">
  <ul>
    <li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<a style="BEHAVIOR: url(#default#homepage)" 
onclick="this.style.behavior='url(#default#homepage)';this.setHomePage('<?php echo getConfig('SITE_DOMAIN');?>')" 
href="javascript:;"><font color="#CA1852">设为首页</font></a>|</li>
    <li><a href="javascript:window.external.addFavorite('<?php echo getConfig('SITE_DOMAIN');?>','<?php echo getConfig('SITE_NAME');?>')">加入收藏</a></li>
  </ul>
</div>
<!-- NAV -->
<?php echo W('Nav', array('tpl' => 'main'));?>
<!-- NAV OVER-->
<div class="con">
<div class="flash"><img src="/static/happy/image/flash.jpg" /><div style="position: absolute; width: 219px; height: 35px; z-index: 4; left: 498px; top: -77px" id="layer6">
	<b><font face="微软雅黑" size="2" color="#D00C4A">美国</font></b><font face="微软雅黑" color="#D00C4A"><b><font size="2">电话</font><font size="5">
	</font></b></font><b><font face="微软雅黑" size="5" color="#D00C4A">3476343819</font></b></div>
	<div style="position: absolute; width: 219px; height: 35px; z-index: 4; left: 720px; top: -77px" id="layer4">
	<font face="微软雅黑" color="#D00C4A"><b><font size="2">中国电话</font><font size="5"> 
	4000979518</font></b></font></div>
</div>
<div class="con_left">
  <div class="kfzx">
    <h2>客服中心 <span>|&nbsp;CUSTOMER SERVICE</span></h2>
    <ul>
      <li class="three" style="color:#F36394;">美国客服电话</li>
      <li class="four" style="color:#F36394;">锺小姐 9178535508</li>
		  <li class="four" style="color:#F36394;">FIFI 9174354158</li>
		  <li class="three">QQ群155953863</li>
    </ul>
  </div>
  <!--美国宝宝优势开始 -->
  <div class="mgbbys">
    <h2>美国宝宝的优势<span>|&nbsp;&nbsp;CHECK IN</span></h2>
    <img class="mgbbys_img" src="/static/happy/image/mgbbys_img.jpg" /> </div>
</div>
	
<table width="668" border="0" align="center" cellpadding="0" cellspacing="0">
	<tbody>
		<tr>
  			<td height="33" valign="bottom" class="STYLE1">
  				<span class="MainBG02"></span>
    			<table width="625" height="25" border="0" align="right" cellpadding="0" cellspacing="0">
          			<tbody><tr>
            			<td width="538" height="28" valign="middle" class="STYLE1"><span class="orangeb"><?php echo ($data["cate_name"]); ?></span></td>
            			<td width="90">　</td>
          			</tr></tbody>
				</table>
			</td>
		</tr>
		<tr>
		  <td height="10"></td>
		</tr>

		<tr>
  			<td>
  				<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
    				<tbody><tr>
      					<td valign="top" class="STYLE1">
      						<table width="93%" border="0" cellspacing="0" cellpadding="0" align="center" class="cupe">          
								<tbody>
									<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?><tr>
				                        <td width="80%" height="25" align="left" class="STYLE1">
										· <a class="STYLE1" href="/index/detail/id/<?php echo ($item["article_id"]); ?>"><?php echo ($item["title"]); ?></a></td>
				                        <td width="2%">　</td>
				                        <td width="18%" align="left" class="STYLE1"><div align="center" class="STYLE1"><?php echo (formatdate($item["ctime"])); ?></div></td>
				                    </tr><?php endforeach; endif; else: echo "" ;endif; ?>
								</tbody>
							</table>
						</td>
					</tr></tbody>
				</table>
			</td>
		</tr>
	</tbody>
</table>
<div class="con_bottom">
  <!-- <ul>
    <li>
      <div style="position: absolute; width: 100px; height: 65px; z-index: 2; left: 50px; top: 1114px" id="layer2"> 友情链接
      </div>
      上海办公室地址：闵行区黄桦路247号俊领国际102室<span> MAIL：SERVER_SH@NYBAOBAO.COM</span> <a href="###">☆MAP地图☆</a></li>
    <li>美国办公室地址：136ST FLUSHING NY 11355<span> MAIL：SERVER_NY@NYBAOBAO.COM </span> <a href="###">☆MAP地图☆</a></li>
  </ul> -->
</div>
</body>
</html>