<?php
	if(isset($_POST["subfinpark"]))
	{
		$res=$park->setParkName($_POST["pid"], $_POST["pname"]);
		if($res==1)
		{
			echo '<script>alert("finish!");</script>';
			echo '<meta http-equiv="refresh" content="0">';
		}
	}
	
	if(isset($_POST["subaddpark"]))
	{
		$res=$park->addPark($_POST["paddname"]);
		
		if($res==1)
		{
			echo '<script>alert("finish!");</script>';
			echo '<meta http-equiv="refresh" content="0">';
		}
	}
	
	
	if(isset($_POST["subfinticket"]))
	{
		$res=$ticket->setTicketInfo($_POST["tid"], $_POST["tname"], $_POST["ttype"], $_POST["tprice"], $_POST["tq"]);
		if($res==1)
		{
			echo '<script>alert("finish!");</script>';
			echo '<meta http-equiv="refresh" content="0">';
		}
	}
	
	if(isset($_POST["subaddticket"]))
	{
		$res=$ticket->addTicket($_POST["taddname"], $_POST["taddparkid"], $_POST["taddtype"], $_POST["taddprice"], $_POST["taddq"]);
		if($res==1)
		{
			echo '<script>alert("finish!");</script>';
			echo '<meta http-equiv="refresh" content="0">';
		}
	}
	
	if(isset($_POST["subfincart"]))
	{
		$res=$cart->setCart($_POST["corderid"], $_POST["cq"], $_POST["ccheck"]);
		if($res==1)
		{
			echo '<script>alert("finish!");</script>';
			echo '<meta http-equiv="refresh" content="0">';
		}
	}
	
	if(isset($_POST["subdelcart"]))
	{
		$res=$cart->deleteCart($_POST["corderid"]);
		if($res==1)
		{
			echo '<script>alert("finish!");</script>';
			echo '<meta http-equiv="refresh" content="0">';
		}
	}
	
	if(isset($_POST["subfinaccount"]))
	{
		//echo '<script>alert("'.$_POST["accountpermission"].'");</script>';
		$log=$account->login($_SESSION["name"], $_SESSION["password"]);
		$res=$account->setPermission($_POST["accountname"], $_POST["accountpermission"]);
		if($res==1)
		{
			echo '<script>alert("finish!");</script>';
			echo '<meta http-equiv="refresh" content="0">';
		}
	}
	
?>