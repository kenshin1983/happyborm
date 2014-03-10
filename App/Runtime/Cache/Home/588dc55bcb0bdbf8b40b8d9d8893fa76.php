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
	</font></b></font><b><font face="微软雅黑" size="5" color="#D00C4A">9178535508</font></b></div>
	<div style="position: absolute; width: 219px; height: 35px; z-index: 4; left: 720px; top: -77px" id="layer4">
	<font face="微软雅黑" color="#D00C4A"><b><font size="2">美国电话</font><font size="5"> 
	9174354158</font></b></font></div>
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
<div class="con_right">
  <div class="rt_news">
    <h2>最新资讯<span>|&nbsp;&nbsp;LATEST</span></h2>
    <div style="position: absolute; width: 373px; height: 160px; z-index: 3; left: 18px; top: 34px" id="layer3">
    	<?php if(is_array($newsList)): $i = 0; $__LIST__ = $newsList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?><table width="96%" border="0" align="center" cellpadding="0" cellspacing="1" class="STYLE1">
			<tr>
			  <td width="231" height="23" class="STYLE1">·<a class="STYLE1" href="/index/detail/id/<?php echo ($item["article_id"]); ?>">
			    <?php echo ($item["title"]); ?>
			    </a>
			      </td>
			  <td width="74" align="left"></td>
			</tr>
			</table><?php endforeach; endif; else: echo "" ;endif; ?>
	</div>
  </div>
  <div class="rt_flash"><script type="text/javascript">
<!--
    var focus_width=278
	var focus_height=186
	var text_height=0
	var swf_height = focus_height+text_height
	var pics='/static/happy/image/poto1.jpg|/static/happy/image/poto2.jpg|/static/happy/image/poto3.jpg|/static/happy/image/poto4.jpg|/static/happy/image/poto5.jpg|/static/happy/image/poto6.jpg'
        var links='/index/detail/id/about|/index/detail/id/about|/index/detail/id/about|/index/detail/id/about|/index/detail/id/about|/index/detail/id/about'
	var texts='我们的办公前台|宽阔的居住环境|香港医院|美丽的办公环境|爱心使者|爱心使者'
	document.write('<object ID="focus_flash" classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" codebase="http://fpdownload.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,0,0" width="'+ focus_width +'" height="'+ swf_height +'">');
	document.write('<param name="allowScriptAccess" value="sameDomain"><param name="movie" value="/static/happy/image/playswfnew.swf"><param name="quality" value="high"><param name="bgcolor" value="#FFFFFF">');
	document.write('<param name="menu" value="false"><param name=wmode value="opaque">');
	document.write('<param name="FlashVars" value="pics='+pics+'&links='+links+'&texts='+texts+'&borderwidth='+focus_width+'&borderheight='+focus_height+'&textheight='+text_height+'">');
	document.write('<embed ID="focus_flash" src="/static/happy/image/playswfnew.swf" wmode="opaque" FlashVars="pics='+pics+'&links='+links+'&texts='+texts+'&borderwidth='+focus_width+'&borderheight='+focus_height+'&textheight='+text_height+'" menu="false" bgcolor="#C5C5C5" quality="high" width="'+ focus_width +'" height="'+ swf_height +'" allowScriptAccess="sameDomain" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" />');		
	document.write('</object>');
	
	//-->

  </script></div>
  <div class="rt_about">
    <h2>关于我们<span>|&nbsp;&nbsp;ABOUT US</span></h2>
	<div class="p_li">
      <p>“喜泰月子中心”位于美国纽约皇后区的法拉盛，一个新移民的聚集地，号称纽约的小中国，没有任何语言问题，</p>
      <p>让您在一个完全陌生的环境中有仍有家乡的感觉。全新装修的优雅别墅位于环境优美的华人住......<a href="/index/detail/id/about">[查看详细]</a></p>
    </div>
    <ul>
      <li>
        <div style="position: absolute; width: 100px; height: 123px; z-index: 1; left: 29px; top: 304px" id="layer1">
          <DIV id=demo style="OVERFLOW: hidden; WIDTH: 640px; HEIGHT: 90px">
            <TABLE cellSpacing=0 cellPadding=0 width="100%" border=0>
              <TBODY>
                <TR>
                  <TD id=demo1 width="99%"><TABLE cellSpacing=0 cellPadding=0 width=1080 border=0>
                      <TBODY>
                        <TR>
                          <TD width="135"><IMG height=90 src="/static/happy/image/jies1.jpg" width=128></TD>
                          <TD width="135"><IMG height=90 src="/static/happy/image/jies2.jpg" width=128></TD>
                          <TD width="135"><IMG height=90 src="/static/happy/image/jies3.jpg" width=128></TD>
                          <TD><IMG height=90 src="/static/happy/image/jies4.jpg" width=128></TD>
                          <TD><IMG height=90 src="/static/happy/image/jies5.jpg" width=128></TD>
                          <TD><IMG height=90 src="/static/happy/image/jies6.jpg" width=128></TD>
                          <TD><IMG height=90 src="/static/happy/image/jies7.jpg" width=128></TD>
                          <TD><IMG height=90 src="/static/happy/image/jies8.jpg" width=128></TD>
                        </TR>
                      </TBODY>
                    </TABLE></TD>
                  <TD id=demo2 width="1%">　</TD>
                </TR>
              </TBODY>
            </TABLE>
          </DIV>
          <SCRIPT lanaguage="javascript">  
<!--  
var speed=30  
demo2.innerHTML=demo1.innerHTML  
function Marquee(){  
if(demo2.offsetWidth-demo.scrollLeft<=0)  
demo.scrollLeft-=demo1.offsetWidth  
else{  
demo.scrollLeft++  
}  
}  
var MyMar=setInterval(Marquee,speed)  
demo.onmouseover=function(){clearInterval(MyMar)}  
demo.onmouseout=function(){MyMar=setInterval(Marquee,speed)}  
//-->  
        </SCRIPT></div>
      </li>
    </ul>
    <p>　
  </div>
  <div class="rt_hzyy">
    <h2>合作医院<span>|&nbsp;&nbsp;COOPERATIVE HOSPITAL</span></h2>
    <div class="hzyy_dl">
      <dl>
        <dd><a href="###"><img src="/static/happy/image/hzyy1.jpg" /></a></dd>
        <dt><a href="###">纽约皇后医院</a></dt>
        <dt><a href="###">New York Hospital Queens</a></dt>
      </dl>
      <dl>
        <dd><a href="###"><img src="/static/happy/image/hzyy2.jpg" /></a></dd>
        <dt><a href="###">纽约法拉盛医院</a></dt>
        <dt><a href="###">Flushing Hospital Medical Center</a></dt>
      </dl>
      <dl>
        <dd><a href="###"><img src="/static/happy/image/hzyy3.jpg" /></a></dd>
        <dt><a href="###">纽约曼哈顿下城医院</a></dt>
        <dt><a href="###">New York Downtown Hospital</a></dt>
      </dl>
      <dl>
        <dd><a href="###"><img src="/static/happy/image/hzyy4.jpg" /></a></dd>
        <dt><a href="###">纽约艾姆赫斯医院</a></dt>
        <dt><a href="###">New York Elmhurts Hospital</a></dt>
      </dl>
    </div>
  </div>
  <div class="rt_fwlc">
    <h2>服务流程<span>|&nbsp;&nbsp;SERVICE PROCESS</span></h2>
    <img src="/static/happy/image/kk.jpg" /> </div>
</div>
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