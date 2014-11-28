<?php
    //视图类
    class View{
        
        private $view_name = null;//视图名称
        private $view_ext  = null;//视图后缀
        private $view_dir  = null;//视图文件夹
        
        public function __construct($view_name)
        {
            $this->init($view_name);
        }
        
        //输出模版文件
        public function display()
        {
            try{
                $file = $this->view_dir . '/' . $this->view_name . $this->view_ext;
                if(!file_exists($file)){
                    Fun::throwError(Fun::getLang('view file not exists'));
                }
                include_once ($file);
            }catch(KsonException $e){
                $e->error();
            }
        }
        
        //初始化
        private function init($view_name)
        {
            $this->view_name = $view_name;
            $this->view_ext  = Fun::getAppConfig('viewExt');
            $this->view_dir  = Fun::getAppConfig('viewDir'); 
        }
    }
?>