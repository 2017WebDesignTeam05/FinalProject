<?php 
	//資料庫主機設定
	$host = "140.123.101.175";
	$username = "team05";
	$password = "eggroll";
	$table = "member";
	$conn = mysql_connect($host,$username,$password,$table);
	if(!$conn){
		die("Connection Failed :".mysql_connect_error());
	}
	else{
		echo "Success";
	}
	mysql_query("SET NAMES 'utf8'");
	
?>
