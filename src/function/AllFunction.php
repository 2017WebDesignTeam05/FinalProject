<?php
	class AllFunction
	{
		public static function connect()
		{
			$database=new Database("127.0.0.1", "team05", "team05", "eggroll");
			$conn=$database->getConn();
			return $conn;
		}
	}
?>