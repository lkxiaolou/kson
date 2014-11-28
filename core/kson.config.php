<?php
    if(!defined('IS_KSON')) die('Access Denied!');
    //核心配置文件
    
    $kson_config['cName'] = 'c';
    $kson_config['aName'] = 'a';
    
    $kson_config['cDir'] = 'c';
    $kson_config['vDir'] = 'v';
    
    $kson_config['mDefault'] = '';
    $kson_config['cDefault'] = 'index';
    $kson_config['aDefault'] = 'init';
    
    $kson_config['FileExt'] = '.class.php';
    
    //调试模式
    $kson_config['deBug'] = true;
?>