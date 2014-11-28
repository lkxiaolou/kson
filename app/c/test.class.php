<?php
    class test extends Controller
    {
        
        function init()
        {
            $sql = 'select * from admin limit 10';
        	$mysql = Mysql::getMysql();
            $data = $mysql->runSql($sql);
            $this->display();
        }
    }
?>