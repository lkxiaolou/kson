<?php
    //控制器类
    class Controller{
        
        private $v = null;//view对象
        
        //显示模版文件
        public function display($view_name = '')
        {
            if($view_name === ''){
                $app = Kson::get_app();
                $view_name = $app->_a;
            }
            $this->init($view_name);
            $this->v->display();
        }
        
        //初始化
        private function init($view_name)
        {
            $this->v = new View($view_name);
        }
    }
?>