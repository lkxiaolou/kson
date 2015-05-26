<?php
	if(!defined('IS_KSON')) die('Access Denied!');
	//公共函数类
	class Fun{
		
		//获取系统配置文件
		public static function getConfig($index = '')
		{
		    global $kson_config;
			if($index !== ''){
				return $kson_config[$index];
			}else{
				return $kson_config;
			}
		}
		
		//获取系统语言文件
		public static function getLang($index = '')
		{
			global $kson_lang;
			if($index !== ''){
				return $kson_lang[$index];
			}
			else{
				return $kson_lang;
			}
		}
		
		//获取app配置
		public static function getAppConfig($index = '')
		{
			global $app_config;
			if($index !== ''){
				return $app_config[$index];
			}
			else{
				return $app_config;
			}
		}
		
		//获取app语言文件
		public static function getAppLang($index = '')
		{
			global $app_lang;
			if($index !== ''){
				return $app_lang[$index];
			}
			else{
				return $app_lang;
			}
		}
		
	    //抛出错误
        public static function throwError($message, $code = 1000)
        {
            throw new KsonException($message, $code = 1000);
        }
	}
?>