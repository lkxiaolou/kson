<?php
    class test
    {
        function __construct()
        {
            
        }
        
        function init()
        {
            $sql = 'select ad from admin limit 10';
        	$mysql = Mysql::getMysql();
            $data = $mysql->runSql($sql);
        	dd($data);
        }
    }
?>