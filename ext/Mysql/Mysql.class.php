<?php
	//数据库类
	class Mysql{
		
		public static $DB = null;
		//连接标识符
		private $conn = null;
		
		private function __construct()
		{
			$this->connect();
		}
		
		public function __clone()
		{
			die(Fun::getConfig('clone is not allow'));
		}
		
		public function __destruct()
		{
			mysql_close($this->conn);
		}
		
		//获取mysql对象单例
		public static function getMysql()
		{
			if(!(self::$DB instanceof self))
			{
				self::$DB = new self();
			}
			return self::$DB;
		}
		
		//连接mysql
		private function connect()
		{
			$host = Fun::getAppConfig('MysqlHost');
			$dbName = Fun::getAppConfig('MysqlDbName');
			$user = Fun::getAppConfig('MysqlUser');
			$pwd = Fun::getAppConfig('MysqlPwd');
			try{
				$this->conn = mysql_connect($host, $user, $pwd);
				mysql_select_db($dbName, $this->conn);
				mysql_set_charset('utf8', $this->conn);
			}catch (ErrorException $e){
				die($e->getMessage());
			}

		}
		
		//执行sql语句
		public function runSql($sql)
		{
			$result = mysql_query($sql, $this->conn);
			$data = array();
			try{
				while($row = mysql_fetch_array($result))
				{
					$data[] = $row;
				}
			}catch(ErrorException $e){
				die($e->getMessage());
			}
			return $data;
		}
	}
?>