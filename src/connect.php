<?php
	require_once("database/Database.php");
	
	$database=new Database("127.0.0.1", "team05", "team05", "eggroll");
	$conn=$database->getConn();
?>