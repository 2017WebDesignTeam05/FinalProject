<?php 
	//資料庫主機設定
	$db_host = "140.123.175.101";
	$db_username = "team05";
	$db_password = "eggroll";
	$db_table = "phpmember";
	//設定資料連線
	if (!@mysql_connect($db_host, $db_username, $db_password)) die("資料連結失敗！");
	//連接資料庫
	if (!@mysql_select_db($db_table)) die("資料庫選擇失敗！");
	//設定字元集與連線校對
	mysql_query("SET NAMES 'utf8'");
?>
