<?php
	spl_autoload_register('functionFile');
	spl_autoload_register('databaseFile');
	spl_autoload_register('templateFile');
	
	
	function functionFile($classname)
	{
		$filename="./function/".$classname.".php";
		if(file_exists($filename))
		{
			require_once($filename);
		}
	}
	
	function templateFile($classname)
	{
		$filename="./template/".$classname.".php";
		if(file_exists($filename))
		{
			require_once($filename);
		}
	}
	
	function databaseFile($classname)
	{
		$filename="./database/".$classname.".php";
		if(file_exists($filename))
		{
			require_once($filename);
		}
	}
?>