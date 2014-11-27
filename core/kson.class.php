<?php
	if(!defined('IS_KSON')) die('Access Denied!');
    //核心类
    class Kson {
        
        //系统开始时间
        public $_startTime = null;
        //app对象
        private static $_app = null;
        //控制器对象
        private $_cObj = null;
        //方法名称
        private $_a = null;
        
        private function __construct()
        {
            $this->init();
        }
        
        //单例模式不允许复制
        public function __clone()
        {
            die(Fun::getLang('clone is not allow'));
        }
        
        //获取单例
        public static function get_app()
        {
        	if(!(self::$_app instanceof self)){
        		self::$_app = new self();
        	}
        	return self::$_app;
        }
        
        //执行
        public static function run()
        {
            //初始化
            self::$_app = self::get_app();
            //运行前
            self::$_app->beforeRun();
            //运行
            $a = self::$_app->_a;
            self::$_app->_cObj->$a();
            //运行后
            self::$_app->afterRun();
        }
        
        //获取c
        public static function getC()
        {
            return isset($_GET[Fun::getConfig('cName')]) ? $_GET[Fun::getConfig('cName')] : Fun::getConfig('cDefault');
        }
        
        //获取a
        public static function getA()
        {
            return isset($_GET[Fun::getConfig('aName')]) ? $_GET[Fun::getConfig('aName')] : Fun::getConfig('aDefault');
        }
        
        //加载
        public static function loadClass($class_name)
        {
            $file_path = APP_PATH . '/' . Fun::getConfig('cDir') . '/' . $class_name . Fun::getConfig('FileExt');
            if(file_exists($file_path)){
                require_once($file_path);
                if(class_exists($class_name)){
                    $obj = new $class_name();
                    return $obj;
                }
                else{
                    die(Fun::getLang('class not exists'));
                }
            }
            else{
                die(Fun::getLang('file not exists'));
            }
        }
        
        //运行前执行
        private function beforeRun()
        {
            //判断方法是否存在
            if(!method_exists($this->_cObj, $this->_a)){
                die(Fun::getLang('action not exists'));
            }
            return true;
        }
        
        //运行后执行
        private function afterRun()
        {
            return true;
        }
        
        //初始化
        private function init()
        {
            //系统运行时间起点
            $this->_startTime = time();
            $this->_cObj = self::loadClass(self::getC());
            $this->_a = self::getA();
        }
    }
?>