<?php
	require_once("autoload.php");	
	session_start();
	
	$conn=AllFunction::connect();
	if($conn)
	{
		$account=new Account($conn);
		
?>
		<head>
			<?php View::showLinker();?>
		</head>
		<body>
			<?php View::showHeader($_SESSION["name"], $_SESSION["permission"]);?>
			<div class="flex page">
				<div>
					<img src="../image/user.png" class="img-fluid">
				</div>
		
				<div>
					<form action="" method="post">
						<div class="form-group">
							<label>Name</label>
							<input type="text" class="form-control" value="<?php echo $_SESSION["name"]; ?>" disabled="disabled">
						</div>
						<div class="form-group">
							<label>Old Password</label>
							<input type="password" class="form-control" id="name01" name="oldPass">
							<!--the id is just for js, it's real one is old passwod-->
						</div>
						<div class="form-group">
							<label>New Password</label>
							<input type="password" class="form-control" id="pass01" name="newPass">
						</div>
						<div class="form-group">
							<label>Re-enter New Password</label>
							<input type="password" class="form-control" id="pass02" name="newPasscheck">
						</div>
						<div class="form-check">
							<button type="submit" name="submitbtn" class="btn btn-primary" id="submit01">Submit</button>
						</div>
					</form>
				</div>
			</div>
			<?php View::showFooter(); ?>
		</body>
<?php
		if(isset($_POST["submitbtn"]))
		{
			$oldPass=$_POST["oldPass"];
			$newPass=$_POST["newPass"];
		
			if(($account->login($_SESSION["name"], $oldPass))==1)
			{
				$account->changePass($newPass);
				echo '<script>alert("Success!")</script>';
					
				echo '
					<form action="login.php" method="post" id="create">
						<input type="hidden" name="name" value="'.$_SESSION["name"].'">
						<input type="hidden" name="password" value="'.$newPass.'">
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
				echo '
					<script>
						$("#name01").css("background", "pink");
					</script>
				';
			}
		}
	}
?>