<?php	
	require_once("autoload.php");
	
	$conn=AllFunction::connect();
	
	if($conn)
	{
		$name=$_POST["name"];
		$password=$_POST["password"];
		
		$account=new Account($conn);
		$login=$account->login($name, $password);
		
		if($login==1)
		{	
			session_start();
			$_SESSION["name"]=$name;
			$_SESSION["password"]=$password;
			$_SESSION["account_id"]=$account->getAccountId();
			$_SESSION["permission"]=$account->accountPermission();
			
			header("Location:./home.php");
		}
		else if($login==0)
		{
			//password error
			echo '<head>';
			View::showLinker();
			echo '<meta http-equiv="refresh" content="2;url=../index.html">';
			echo '</head>';
			echo '<body>';
			View::showHeader(null, null);
			View::showError("Password error!");
			View::showFooter();
			echo '</body>';
		}
		else
		{
			//name of account not create
			echo '<head>';
			View::showLinker();
			echo '<meta http-equiv="refresh" content="2;url=../index.html">';
			echo '</head>';
			echo '<body>';
			View::showHeader(null, null);
			View::showError("Create Account First!");
			View::showFooter();
			echo '</body>';
		}
	}
?>
