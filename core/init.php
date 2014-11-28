<?php
	if(!defined('IS_KSON')) die('Access Denied!');
	//载入调试类kint
	require(ROOT_PATH . '/ext/Kint/Kint.class.php');
	//载入核心配置
	require(ROOT_PATH . '/core/kson.config.php');
	//载入语言
	require(ROOT_PATH . '/core/kson.lang.php');
	//载入核心函数类
	require(ROOT_PATH . '/core/Fun.class.php');
	//载入核心类
	require(ROOT_PATH . '/core/kson.class.php');
	//载入异常类
    require (ROOT_PATH . '/core/KsonException.class.php');
	//载入项目配置
	require(APP_PATH . '/config/config.php');
	//载入Mysql类
	require (ROOT_PATH . '/ext/Mysql/Mysql.class.php');
?>