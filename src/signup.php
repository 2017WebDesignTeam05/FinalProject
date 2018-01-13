<?php
	require_once("autoload.php");
	
	$conn=AllFunction::connect();
	if($conn)
	{
		echo '1';
		$name=$_POST["name"];
		$password=$_POST["password"];
		
		$createAccount=new Account($conn);
		$add=$createAccount->addAccount($name, $password);
		
		if($add==1)
		{
			echo '
				<form action="login.php" method="post" id="create">
					<input type="hidden" name="name" value="'.$name.'">
					<input type="hidden" name="password" value="'.$password.'">
				</form>
			';
		
			echo "
				<script type='text/javascript'>
					document.getElementById('create').submit();
				</script>
			";
		}
		else
		{
			//add account error
			echo '<head>';
			View::showLinker();
			echo '<meta http-equiv="refresh" content="3;url=../index.html">';
			echo '</head>';
			echo '<body>';
			View::showHeader(null, null);
			View::showError("Change account name and try again");
			View::showFooter();
			echo '</body>';
		}
	}
?>