<?php
    if(!defined('IS_KSON')) die('Access Denied!');
    class KsonException extends Exception{
        
        public function __construct($message, $code){
            $this->message = $message;
            $this->code = $code;
        }
        
        //输出错误信息
        public function error()
        {
            //调试模式不输出错误
            $is_debug = Fun::getConfig('deBug');
            if(!$is_debug){
                $this->message = '系统繁忙';
            }
            //是否为ajax请求
            if($this->isAjax()){
                exit(json_encode(array('msg' => $this->message, 'code' => $this->code)));
            }else{
                exit($this->message);
            }
        }
        
        //判断是否为ajax请求
        private function isAjax()
        {
            if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') return true;
            if (isset($_POST['is_ajax']) || isset($_GET['is_ajax'])) {
            	if($_POST['is_ajax'] || $_GET['is_ajax']){
            		return true;
            	}
            }
            return false;
        }
    
    }
?>