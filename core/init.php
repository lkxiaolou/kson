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
	
	/**
	 * 自动载入Server类
	 */
	function __autoload($server_class_name)
	{
	    //server类不允许跨目录，安全起见
	    if(preg_match('/\.\./', $server_class_name)){
	        Fun::throwError('server class name illegal');
	    }
	    $path = APP_PATH . '/s/' . $server_class_name . '.php';
	    if(file_exists($path)){
	        require $path;
	    }else{
	        Fun::throwError('server class file not found');
	    }
	}
?>