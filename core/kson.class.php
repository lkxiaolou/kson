<?php
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
            die(self::getLang('clone is not allow'));
        }
        
        //执行
        public static function run()
        {
            //初始化
            self::$_app = new Kson();
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
            return isset($_GET[self::getConfig('cName')]) ? $_GET[self::getConfig('cName')] : self::getConfig('cDefault');
        }
        
        //获取a
        public static function getA()
        {
            return isset($_GET[self::getConfig('aName')]) ? $_GET[self::getConfig('aName')] : self::getConfig('aDefault');
        }
        
        //获取配置文件
        public static function getConfig($index = '')
        {
            global $kson_config;
            if($index !== ''){
                return $kson_config[$index];
            }
            else{
                return $kson_config;
            }
        }
        
        //获取语言文件
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
        
        //加载
        public static function loadClass($class_name)
        {
            $file_path = APP_PATH . '/' . self::getConfig('cDir') . '/' . $class_name . self::getConfig('FileExt');
            //dd($file_path);
            if(file_exists($file_path)){
                require_once($file_path);
                if(class_exists($class_name)){
                    $obj = new $class_name();
                    return $obj;
                }
                else{
                    die(self::getLang('class not exists'));
                }
            }
            else{
                die(self::getLang('file not exists'));
            }
        }
        
        //运行前执行
        private function beforeRun()
        {
            //判断方法是否存在
            if(!method_exists($this->_cObj, $this->_a)){
                die(self::getLang('action not exists'));
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