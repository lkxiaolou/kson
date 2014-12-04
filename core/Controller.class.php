<?php
    //控制器类
    class Controller{
        
        private $v = null;//view对象
        private $var = array();
        
        //显示模版文件
        public function display($view_name = '')
        {
            if($view_name === ''){
                $app = Kson::get_app();
                $view_name = $app->_a;
            }
            $this->_init($view_name);
            $this->v->display();
        }
        
        //初始化
        private function _init($view_name)
        {
            $this->v = new View($view_name, $this->var);
        }
        
        //变量赋值
        public function assign($name, $value)
        {
        	$this->var[$name] = $value;
        }
    }
?>