<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>管理系统登录</title>
</head>
<body onLoad="document.login.account.focus()" >
	<form method='post' name="login" id="form1" ACTION="/Admin/Public/login">
		<h2>管理系统登录</h2>
		<h4 style="color:red"><?php echo ($errorMsg); ?></h4>
		<label>用户名：<input type="text" name="account" /></label><br />
		<label>密　码：<input type="password" name="password" /></label><br />
		<input type="submit" value="登陆" />
	</form>
</body>
</html>