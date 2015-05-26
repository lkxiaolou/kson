<?php
	if(!defined('IS_KSON')) die('Access Denied!');
	//载入核心类
	$core_dir = opendir(ROOT_PATH . '/core/');
	while (($file = readdir($core_dir)) != false)
	{
	    //带.class.的文件将视为类载入
	    if(preg_match('/\.class\.php$/', $file)){
	        require ROOT_PATH . '/core/' . $file;
	    }
	}
	closedir($core_dir);
	//载入系统配置文件
	require (ROOT_PATH . '/core/kson.config.php');
	//载入系统语言
	require (ROOT_PATH . '/core/kson.lang.php');
	//载入项目配置
	require (APP_PATH . '/config/config.php');
	//载入Mysql类
	require (ROOT_PATH . '/ext/Mysql/Mysql.class.php');
?>