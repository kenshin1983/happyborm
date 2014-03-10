<?php
error_reporting(E_ALL);
ini_set('display_error', 1);
define('ROOT_PATH', dirname(dirname(__FILE__)));
//定义项目名称
define('APP_NAME', 'App');
//定义项目路径
define('APP_PATH', ROOT_PATH . '/App/');
//开启调试模式
define('APP_DEBUG', true);
//加载框架入文件
require ROOT_PATH . '/ThinkPHP/ThinkPHP.php';

