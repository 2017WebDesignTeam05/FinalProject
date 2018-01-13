<?php
	class Database
	{
		private $host;
		private $DBname;
		private $username;
		private $password;
		
		public $conn;
		
		public function __construct($host, $DBname, $username, $password)
		{
			$this->host=$host;
			$this->DBname=$DBname;
			$this->username=$username;
			$this->password=$password;
			
			$this->connect();
		}
		
		public function __destruct()
		{
			$this->close();
		}
		
		private function connect()
		{
			try
			{
				$paramSet=array
				(
					//長連接
					PDO::ATTR_PERSISTENT=>true,
					
					//防sql injection
					//PDO::ATTR_EMULATE_PREPARES=>true,
					
					//錯誤報告 拋出異常
					PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION,
					
					//MySQL查詢緩衝區
					PDO::MYSQL_ATTR_USE_BUFFERED_QUERY=>true
				);
				
				$this->conn=new PDO('mysql:host='.$this->host.';dbname='.$this->DBname.';charset=utf8', $this->username, $this->password, $paramSet);
				//echo "Connected sucessfully.";
			}
			catch(PDOException $e)
			{
				echo "Connection failed:".$e->getMessage();
				die();
			}
		}
		
		public function getConn()
		{
			return $this->conn;
		}
		
		private function close()
		{
			$this->conn=null;
		}
		
	}
?>