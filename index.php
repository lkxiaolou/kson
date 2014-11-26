<?php
    //utf-8编码
    header("Content-Type:text/html; charset=utf-8");
    //载入配置
    require('./core/kson.config.php');
    //载入语言
    require('./core/kson.lang.php');
    //载入核心类
    require('./core/kson.class.php');
    //定义app入口
    define('APP_PATH', './app');
    //运行
    kson::run();
?>