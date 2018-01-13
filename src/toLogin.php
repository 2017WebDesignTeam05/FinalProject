<?php
	function toLogin($name, $password)
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
?>