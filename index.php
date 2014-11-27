<?php
    //utf-8编码
    header("Content-Type:text/html; charset=utf-8");
    define('IS_KSON', true);
    define('ROOT_PATH', getcwd());
    //定义app入口
    define('APP_PATH', ROOT_PATH . '/app');
    //初始化
    require_once(ROOT_PATH . '/core/init.php');
    kson::run();
?>