<?php
	if(!defined('IS_KSON')) die('Access Denied!');
	//载入Kint调试类
    require (ROOT_PATH . '/ext/kint/Kint.class.php');
	//载入核心类
	$core_dir = opendir(ROOT_PATH . '/core/');
	while (($file = readdir($core_dir)) != false)
	{
	    if($file !== 'init.php' && $file !== '.' && $file !== '..'){
	        require_once (ROOT_PATH . '/core/' . $file);
	    }
	}
	closedir($core_dir);
	//载入项目配置
	require (APP_PATH . '/config/config.php');
	//载入Mysql类
	require (ROOT_PATH . '/ext/Mysql/Mysql.class.php');
?>