<?php
    class test extends Controller
    {
        
        function index()
        {
            $sql = 'select * from user limit 10';
        	$mysql = Mysql::getMysql();
            $data = $mysql->runSql($sql);
            $this->assign('data', $data);
            $this->display();
        }
    }
?>